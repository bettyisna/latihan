<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        
        $barangs = Barang::all();
        //$barang = Barang::first();

        //dd($barang);
        return view("barang", compact('barangs'));
    }

    public function create(Request $request){
        //dd($request->all());

        //Validasi Inputan
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|',
            'is_active' => 'required',
        ]);
        
        //dd($request);

        //Penamaan File Upload
        $imageName = 'gambar_' . time() . '.' . $request->gambar->extension();

        //Manupulasi boolean value
        $is_active = ($request->is_active === 'true') ? 1 : 0;
        //Nyimpen gambar di storage
        $request->gambar->move(public_path('gambar'), $imageName);

        //Buat variable untuk Model yang digunakan untuk menyimpan form
        
        $barang = new Barang();
        //dd($barang);
        $barang->nama_barang = $request->nama_barang;
        $barang->jumlah = $request->jumlah;
        $barang->gambar = 'gambar/'.$imageName;
        $barang->is_active = $is_active;
        //dd($barang);
        //Storing to database ->save()
        $barang->save();

        return redirect()
        ->route('read.barang')
        ->with('success', 'Product created successfully.');
    }

    public function edit($id){
        $barang = Barang::find($id);
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
    
}
