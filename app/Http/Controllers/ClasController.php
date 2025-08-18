<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;

class ClasController extends Controller
{
     // fungsi untuk mengarahkan ke halaman index clas
    public function index(){
        // siapkan data clas
        $clases = Clas::all();

        return view('clas.index', compact('clases')); 
    }


    // fungsi untuk mengarahkan ke halaman create
    public function create(){
        return view('clas.create');
    }


    // fungsi untuk store data clas
    public function store(Request $request){
        // validasi data
        $request->validate([
            'name'        => 'required',
            'description' => 'required'
        ]);

        // siapkan data yang akan di masukan ke dalam database
        $dataclase_store = [
            'name'          => $request->name, 
            'description'   => $request->description 
        ];

        // simpan data ke dalam database
        Clas::create($dataclase_store);

        // pindahkan user ke halaman beranda
        return redirect('/clas');
    }




    
    // fungsi untuk mengarahkan ke halaman show
    public function show($id) {

        // cari data clas berdasarkan id
        $clas = Clas::find($id);

        // cek apakah data clas ada atau tidak
        if ($clas == null) {
            return redirect('/clas');
        }

        // pindahkan user ke halaman show dan kirimkan data
        return view('clas.show', compact('clas'));
    }


    // fungsi untuk delete data
    public function destroy($id) {

        // cari data clas berdasarkan id
        $clas = Clas::find($id);
        

        // cek apakah data clas ada atau tidak
        if ($clas != null) {
            $clas->delete();
        }
        
        // pindahkan user ke halaman show dan kirimkan data
        return redirect('/clas');
    }



    // fungsi untuk mengarahkan ke halaman edit
    public function edit($id) {

        // cari data clas berdasarkan id
        $clas = Clas::find($id);

        // cek apakah data clas ada atau tidak
        if ($clas == null) {
            return redirect('/clas');
        }

        // pindahkan user ke halaman edit dan kirimkan data
        return view('clas.edit', compact('clas'));
    }


    // fungsi untuk store data clas
    public function update(Request $request, $id){
        // validasi data
        $request->validate([
            'name'        => 'required',
            'description' => 'required'
        ]);

        // cari data clas berdasarkan id
        $clas = Clas::find($id);

        // siapkan data yang akan di masukan ke dalam database
        $dataclase_update = [
            'name'          => $request->name, 
            'description'   => $request->description 
        ];

        // simpan data ke dalam database
        $clas->update($dataclase_update);

        // pindahkan user ke halaman beranda
        return redirect('/clas');
    }



}
