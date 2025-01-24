<div>

    <form action="{{ route('create.barang') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang">
        
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah">
        
        <label for="gambar">gambar</label>
        <input type="file" name="gambar" id="gambar">

        
        <label>
            <input type="radio" name="is_active" id="is_active" value="true"> YA
        </label>
        <label>
            <input type="radio" name="is_active" id="is_active" value="false"> TIDAK
        </label>

        <button type="submit">Submit</button>
    </form>

    @foreach ($barangs as $barang)
        <h1>Nama Barang adalah: {{ $barang->nama_barang }}</h1>
        <h2>Jumlah: {{ $barang->jumlah }} </h2>
        <img src="{{ asset($barang->gambar) }}" alt="">

    @endforeach

</div>