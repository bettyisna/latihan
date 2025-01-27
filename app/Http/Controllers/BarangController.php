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

    //show edit form
    public function edit($id){
        $barang = Barang::find($id);
        return view('edit.barang', compact('barang'));

    }

    //update data in database
    public function update(Request $request, $id){
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'gambar' => 'required|longtext',
            'is_active' => 'required|boolean'
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama,
            'jumlah' => $request->jumlah,
            'gambar' => $request->gambar,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('edit.barang', $id)->with('success', 'Barang berhasil diperbarui!');

    }

    public function destroy($id){

    }
    
}
