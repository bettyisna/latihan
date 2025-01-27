<div>
<!-- Extend Layout (layouts.app) -->
@extends('layouts.app') 

<!-- Masukin konten di yield 'content' -->
 <!-- Section untuk manggil yield content, penamaan yield dan section harus sama -->
    @section('content')

    <div class="border-b border-gray-900/10 pb-12 bg-green-50">
      <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
    <form action="{{ route('create.barang') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="sm:col-span-3">
          <label for="nama_barang" class="block text-sm/6 font-medium text-gray-900">Nama Barang</label>
          <div class="mt-2">
            <input type="text" name="nama_barang" id="nama_barang" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
        </div>
       
        <div class="sm:col-span-3">
          <label for="jumlah" class="block text-sm/6 font-medium text-gray-900">Jumlah</label>
          <div class="mt-2">
            <input type="number" name="jumlah" id="jumlah" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
        </div>

        <div class="col-span-full">
          <label for="gambar" class="block text-sm/6 font-medium text-gray-900">Cover photo</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm/6 text-gray-600">
                <label for="gambar" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                  <span>Upload a file</span>
                  <input id="gambar" name="gambar" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>
        </div>
        
        <label>
            <input type="radio" name="is_active" id="is_active" value="true"> YA
        </label>
        <label>
            <input type="radio" name="is_active" id="is_active" value="false"> TIDAK
        </label>

        <button type="submit">Submit</button>
    </form>
</div>

</div>
    @foreach ($barangs as $barang)
        <h1>Nama Barang adalah: {{ $barang->nama_barang }}</h1>
        <h2>Jumlah: {{ $barang->jumlah }} </h2>
        <img src="{{ asset($barang->gambar) }}" alt="">

    @endforeach

    @endsection
</div>