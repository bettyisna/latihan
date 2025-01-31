<div>
<!-- Extend Layout (layouts.app) -->
@extends('layouts.app') 

<!-- Masukin konten di yield 'content' -->
 <!-- Section untuk manggil yield content, penamaan yield dan section harus sama -->
    @section('content')

    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-base/7 font-semibold text-gray-900">Kategori Barang</h2>
      

    <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-4">
    <form action="{{ route('create.kategori') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="sm:col-span-3">
          <label for="kategori" class="block text-sm/6 font-medium text-gray-900">Kategori Barang</label>
          <div class="mt-2">
            <input type="text" name="kategori" id="kategori" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
        </div>
       

</div>
    @foreach ($kategoris as $kategori)
        <h1>Nama Barang adalah: {{ $kategori->nama_kategori }}</h1>
        <h2>Jumlah: {{ $kategori->jumlah }} </h2>
        <img src="{{ asset($kategori->gambar) }}" alt="">
        <br>
        <a href="{{ route ('edit.kategori', $kategori->id)}}">Edit</a>
        <hr>

        <!-- Delete Button -->
        <form action="{{ route('delete.kategori', $kategori->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
        </form>
    @endforeach

    @endsection

</div>