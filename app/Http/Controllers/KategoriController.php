<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        
        //manggil model
        $kategoris = KategoriBarang::all();
        //$barang = Barang::first();

        //dd($barang);
        return view("kategori", compact('kategoris'));
    }

    public function create(Request $request){
        //dd($request->all());

        //Validasi Inputan
        $request->validate([
            'kategori' => 'required',
        ]);


        //Buat variable untuk Model yang digunakan untuk menyimpan form
        $kategori = new KategoriBarang();
        //dd($barang);
        $kategori->kategori = $request->kategori;
 
        //dd($barang);
        //Storing to database ->save()
        $kategori->save();
    }
    
    public function edit($id){
        $kategori = KategoriBarang::find($id);
        return view('editkategori', compact('kategori'));
    
    }
    public function update(Request $request, $id){
        //mencari id kategori
        $kategori=KategoriBarang::find($id);

        //validate
        $request->validate([
            'kategori'=>'required',
        ]);

        //update data
        $kategori->kategori = $request->kategori;

        //menyimpan data
        $kategori->save();
    }

}
