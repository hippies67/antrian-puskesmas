<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Alert;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login.data');
    }

    public function auths(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            return redirect()->route('dashboard');
        } else {
            Alert::error('Gagal', "Username atau Password yang anda masukan salah!");
            return redirect()->back();
        }
        
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('admin.auth.registrasi.data');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|min:3|max:50',
            'username' => 'required|unique:users|min:3|max:45',
            'email' => 'required|email|unique:users|min:5|max:80',
            'password' => 'required|confirmed',
            'no_hp' => 'required|min:12|max:12',
        ],
        [
            'nama_lengkap.required' => 'Nama Lengkap harus di isi.',
            'nama_lengkap.min' => ' Nama Lengkap yang dimasukan minimal harus 3 karakter.',
            'nama_lengkap.max' => ' Nama yang dimasukan tidak boleh lebih dari 45 karakter.',
            'username.required' => 'Username harus di isi.',
            'username.unique' => 'Username sudah tersedia.',
            'username.min' => ' Username yang dimasukan minimal harus 3 karakter.',
            'username.max' => ' Username yang dimasukan tidak boleh lebih dari 45 karakter.',
            'email.required' => 'Email harus di isi.',
            'email.unique' => 'Email sudah tersedia.',
            'email.min' => ' Email yang dimasukan minimal harus 5 karakter.',
            'email.max' => ' Email yang dimasukan tidak boleh lebih dari 80 karakter.',
            'password.required' => 'Password harus di isi.',
            'password.confirmed' => 'Konfirmasi Password tidak sama.',
            'no_hp.required' => 'Nomor Hp harus di isi.',
            'no_hp.min' => 'Nomor Hp yang dimasukan minimal harus 12 karakter.',
            'no_hp.max' => 'Nomor Hp yang dimasukan tidak boleh lebih dari 12 karakter!.',
        ]);



        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
        ];

        User::create($data)
        ? Alert::success('Sukses', "Akun telah berhasil terdaftar.")
        : Alert::error('Error', "Akun gagal terdaftar!");

        return redirect()->back();

        
    }
}
