<?php

namespace App\Http\Controllers;

use App\Models\ModelMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $dataMahasiswa = ModelMahasiswa::all();
        return view('mahasiswa/mahasiswa', ['data' => $dataMahasiswa]);
    }


    public function insert(Request $request)
    {

        $data = ModelMahasiswa::insert([
            'nim' => $request->nim,
            'name' => $request->name,
            'jeniskelamin' => $request->jeniskelamin,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        $dataMahasiswa = ModelMahasiswa::all();
        return redirect()->route('mahasiswa');
    }

    public function detail($nim)
    {
        $data = ModelMahasiswa::select('*')
            ->where('nim', $nim)
            ->get();
        return view('mahasiswa/detail', ['data' => $data]);
    }

    public function edit($nim)
    {
        $data = ModelMahasiswa::select('*')
            ->where('nim', $nim)
            ->get();
        return view('mahasiswa/edit', ['data' => $data]);
    }

    public function hapus($nim)
    {
        $delete = DB::table('users')
            ->where('nim', $nim)
            ->delete();
        return back()->with('success', 'Data telah terkirim');
    }

    public function update(Request $request)
    {

        $updateting = DB::table('users')
            ->where('id', $request->input('id'))
            ->update([
                'nim' => $request->input('nim'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'status' => $request->input('status')
            ]);

        $dataMahasiswa = ModelMahasiswa::all();
        return redirect()->route('mahasiswa');
    }
}
