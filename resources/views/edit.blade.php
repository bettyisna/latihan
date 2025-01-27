@extends('layouts.app')

@section('content')

<div class="border-b border-gray-900/10 pb-12 bg-green-50">
    <h2 class="text-base/7 font-semibold text-gray-900">Edit Barang</h2>

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <form action="{{ route('update.barang', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="sm:col-span-3">
                <label for="nama_barang" class="block text-sm/6 font-medium text-gray-900">Nama Barang</label>
                <div class="mt-2">
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1">
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="jumlah" class="block text-sm/6 font-medium text-gray-900">Jumlah</label>
                <div class="mt-2">
                    <input type="number" name="jumlah" id="jumlah" value="{{ $barang->jumlah }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1">
                </div>
            </div>

            <div class="col-span-full">
                <label for="gambar" class="block text-sm/6 font-medium text-gray-900">Cover Photo</label>
                <div class="mt-2">
                    <input type="file" id="gambar" name="gambar">
                </div>
                @if ($barang->gambar)
                    <p class="mt-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $barang->gambar) }}" width="150">
                @endif
            </div>

            <label>
                <input type="radio" name="is_active" value="true" {{ $barang->is_active ? 'checked' : '' }}> YA
            </label>
            <label>
                <input type="radio" name="is_active" value="false" {{ !$barang->is_active ? 'checked' : '' }}> TIDAK
            </label>

            <button type="submit">Update</button>
        </form>
    </div>
</div>

@endsection
