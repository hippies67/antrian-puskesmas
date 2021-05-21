<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliKlinik;
use App\Models\Antrian;
use Alert;
class FrontController extends Controller
{
    public function index()
    {
        return view('front');
    }

    public function antrian()
    {   
        $data['loket_1'] = PoliKlinik::skip(0)->take(3)->get();
        $data['loket_2'] = PoliKlinik::skip(3)->take(6)->get();
        $data['loket_3'] = PoliKlinik::skip(6)->take(9)->get();
        return view('ambil_antrian', $data);
    }

    public function antrian_store(Request $request)
    {
        $request->validate([
            'antrian' => 'required',
            'poli' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'antrian' => $request->antrian,
            'poli' => $request->poli,
            'status' => $request->status
        ];

        Antrian::create($data) 
        ? Alert::success('Berhasil', 'Poli Klinik telah berhasil dimasukkan')
        : Alert::error('Gagal', 'Poli Klinik gagal dimasukkan');

        return redirect()->back();
    }
}
