<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PoliKlinik;
use Alert;

class PoliKlinikController extends Controller
{
    public function poliklinik()
    {
        $data['poliklinik'] = PoliKlinik::all();
        return view('admin.poliklinik.data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli' => 'required|unique:poliklinik',
            'status' => 'nullable'
        ]);

        $data = [
            'poli' => $request->poli,
            'status' => $request->status
        ];

        PoliKlinik::create($data) 
        ? Alert::success('Berhasil', 'Poli Klinik telah berhasil dimasukkan')
        : Alert::error('Gagal', 'Poli Klinik gagal dimasukkan');

        return redirect()->back();
    }

    public function update(Request $request, PoliKlinik $poliklinik)
    {
        $request->validate([
            'edit_poli' => "required|unique:poliklinik,poli,$poliklinik->id",
            'edit_status' => 'nullable'
        ]);

        $data = [
            'poli' => $request->edit_poli,
            'status' => $request->edit_status
        ];

        $poliklinik->update($data)
            ? Alert::success('Berhasil', 'Poli Klinik telah berhasil di ubah')
            : Alert::error('Gagal', 'Poli Klinik gagal di ubah');

        return redirect()->back();
    }

    public function updateStatus(Request $request, PoliKlinik $poliklinik)
    {
        $request->validate([
            'edit_poli' => "required|unique:poliklinik,poli,$poliklinik->id",
            'edit_status' => 'nullable'
        ]);

        $data = [
            'poli' => $request->edit_poli,
            'status' => $request->edit_status
        ];

        $poliklinik->update($data)
            ? Alert::success('Berhasil', 'Poli Klinik telah berhasil di ubah')
            : Alert::error('Gagal', 'Poli Klinik gagal di ubah');

        return redirect()->back();
    }

    public function checkPoli(Request $request)
    {
        if ($request->Input('poli'))
        {
            $poli = PoliKlinik::where('poli', $request->Input('poli'))->first();
            if ($poli)
            {
                return 'false';
            } else {
                return 'true';
            }
        }

        if ($request->Input('edit_poli'))
        {
            $edit_poli = PoliKlinik::where('poli', $request->Input('edit_poli'))->first();
            if ($edit_poli)
            {
                return 'false';
            } else {
                return 'true';
            }
        }
    }

    public function delete(PoliKlinik $poliklinik)
    {
        $poliklinik->delete()
        ? Alert::success('Berhasil', 'Poli Klinik telah berhasil di hapus')
        : Alert::error('Gagal', 'Poli Klinik gagal di hapus');

        return redirect()->back();
    }
}