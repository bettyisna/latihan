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
        return view('edit', compact('barang'));

    }

    public function update(Request $request, $id)
    {
        // Find the barang by ID
        
        $barang = Barang::findOrFail($id); 
        
        // Validate the incoming data (you can add your validation rules here)
        $validated = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'jumlah' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        'is_active' => 'required|boolean',
         ]);

        // Update the barang data
        $barang->nama_barang = $request->nama_barang;
        $barang->jumlah = $request->jumlah;
        $barang->is_active = $request->is_active;

        // Handle image upload if necessary
        if ($request->hasFile('gambar')) {
             $imagePath = $request->file('gambar')->store('images', 'public');
            $barang->gambar = $imagePath;
        }

    // Save the updated record
    $barang->save();

    // Redirect back with a success message
    return redirect()->route('read.barang')->with('success', 'Barang updated successfully');
    }

    public function destroy($id){
        $barang = Barang::findOrFail($id);

        // Delete the associated image file if it exists
        if ($barang->gambar && file_exists(public_path($barang->gambar))) {
            unlink(public_path($barang->gambar));
        }

        $barang->delete();

        return redirect()->route('read.barang')->with('success', 'Barang deleted successfully.');

    }
    
}
