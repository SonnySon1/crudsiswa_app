<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // fungsi untuk mengarahkan ke halaman index sisa
    public function index(){
        // siapkan data / panggil data siswa atau user
        $siswas = User::all();



        return view('siswa.index', compact('siswas')); 
    }


    // fungsi untuk mengarahkan ke halaman create
    public function create(){
        // siapkan data / panggil data kelas
        $clases = Clas::all();
        
        return view('siswa.create', compact('clases'));
    }

    
    // untuk store data siswa
    public function store(Request $request){
        // validasi data
        $request->validate([
            'name'          => 'required',
            'nisn'          => 'required | unique:users,nisn',  
            'alamat'        => 'required',  
            'email'         => 'required | unique:users,email',  
            'password'      => 'required',  
            'no_handphone'  => 'required | unique:users,no_handphone',
            'foto'          => 'required | image | mimes:jpeg,png,jpg,gif'
        ]);

        // siapkan data yang akan di masukan
        $datasiswa_store = [
            'clas_id'       => $request->kelas_id,
            'name'          => $request->name,
            'nisn'          => $request->nisn,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'password'      => $request->password,
            'no_handphone'  => $request->no_handphone
        ];

        // upload gambar
        $datasiswa_store['photo'] = $request->file('foto')->store('profilesiswa', 'public');

        // masukan data ke dalam tabel user
        User::create($datasiswa_store);

        // arahkan user ke haaman beranda
        return redirect('/');
    }

}
