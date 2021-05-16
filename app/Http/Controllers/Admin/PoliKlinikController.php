<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliKlinikController extends Controller
{
    public function poliklinik()
    {
        return view('admin.poliklinik.data');
    }
}