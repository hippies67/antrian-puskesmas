<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Antrian;
use Alert;
class AntrianController extends Controller
{
    public function loket_1()
    {   
        $data['antrian'] = Antrian::where('antrian', '=', 'Loket 1')->get();
        return view('admin.antrian.loket_1.data', $data);
    }

    

    
    public function loket_2()
    {
        $data['antrian'] = Antrian::where('antrian', '=', 'Loket 2')->get();
        return view('admin.antrian.loket_2.data', $data);
    }

    

    public function loket_3()
    {
        $data['antrian'] = Antrian::where('antrian', '=', 'Loket 3')->get();
        return view('admin.antrian.loket_3.data', $data);
    }

    
}
