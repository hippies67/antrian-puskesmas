<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function loket_1()
    {
        return view('admin.antrian.loket_1.data');
    }

    public function loket_2()
    {
        return view('admin.antrian.loket_2.data');
    }

    public function loket_3()
    {
        return view('admin.antrian.loket_3.data');
    }
}
