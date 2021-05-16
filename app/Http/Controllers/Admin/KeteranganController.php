<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeteranganController extends Controller
{
    public function keterangan()
    {
        return view('admin.keterangan.data');
    }
}
