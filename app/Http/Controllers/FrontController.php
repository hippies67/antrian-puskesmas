<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliKlinik;
class FrontController extends Controller
{
    public function index()
    {
        return view('front');
    }

    public function antrian()
    {
        $data['poliklinik'] = PoliKlinik::all();
        return view('ambil_antrian', $data);
    }
}
