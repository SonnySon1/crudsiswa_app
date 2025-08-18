<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    // buat fungsi untuk delete data siswa
    public function destroy($id){
        // cari data user di databse berdasarkan id user
        $datasiswa = User::find($id);
        
        // cek apakah data user ada atau tidak
        if ($datasiswa != null) {
            Storage::disk('public')->delete($datasiswa->photo);
            $datasiswa->delete();
        }

        // kembalikan user ke halaman home / beranda
        return redirect('/');
    }


    // untuk menampilkan view detail siswa
    public function show($id) {
        // cari data user di databse berdasarkan id user
        $datauser = User::find($id);

        // cek apakah datanya ada atau tidak
        if ($datauser == null) {
            return redirect('/');
        }
        

        // kembalikan user ke halaman show dan kirimkan data user yang di ambil berdasarkan id
        return view('siswa.show', compact('datauser'));
    }


    public function edit($id) {
        // siapkan data / panggil data kelas
        $clases = Clas::all();

        // ambil data user / siswa di dalam tabel user berdasarkan id
        $datauser = User::find($id);

        return view('siswa.edit', compact('clases', 'datauser'));
    }



    // funsi update data siswa
    public function update(Request $request, $id) {
        // validasi data
         $request->validate([
            'name'          => 'required',
            'nisn'          => 'required',  
            'alamat'        => 'required',  
            'email'         => 'required',
            'no_handphone'  => 'required',
        ]);

        // cari di dalam tabel user apakah ada user yang akan di update cari berdasarkan id
        $datasiswa = User::find($id);

        // siapkan data yang akan di simpan sebagai update
        $datasiswa_update = [
            'clas_id'       => $request->kelas_id,
            'name'          => $request->name,
            'nisn'          => $request->nisn,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'no_handphone'  => $request->no_handphone
        ];

        // cek apakah user update password atau tidak
        if ($request->password != null) {
            $datasiswa_update['password'] = $request->password;
        }

        // cek apakah user update foto atau tidak
        if ($request->hasFile('foto')) {
             // hapus file gambar sebelumnya dari file
             Storage::disk('public')->delete($datasiswa->photo);

             // upload gambar baru
             $datasiswa_update['photo'] = $request->file('foto')->store('profilesiswa', 'public');
        }


        // simpan data ke dalam database dengan data yang terbaru sesuai update
        $datasiswa->update($datasiswa_update);

        // pindahkan user ke halaman beranda
        return redirect('/');
    }
}