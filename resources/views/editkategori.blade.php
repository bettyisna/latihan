@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-lg font-semibold text-gray-900">Edit Kategori</h2>

    <form action="{{ route('update.kategori', ['id' => $kategori->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <label for="kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ $kategori->kategori }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
            <a href="{{ route('read.kategori') }}" class="ml-2 px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection