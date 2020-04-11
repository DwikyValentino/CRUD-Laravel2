@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error  }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ action('PersediaanBarangController@store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Kode Barang</label>
                <input class="form-control" type="text" name="kodebarang" placeholder="Kode Barang"/>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input class="form-control" type="text" name="namabarang" placeholder="Nama Barang"/>
            </div>
            <div class="form-group">
                <label>Harga Pokok</label>
                <input class="form-control" type="number" name="hargapokok" placeholder="Harga Pokok"/>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input class="form-control" type="number" name="hargajual" placeholder="Harga Jual"/>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input class="form-control" type="number" name="jumlah" placeholder="Jumlah"/>
            </div>
            <div class="form-group">
                <label>Nilai</label>
                <input class="form-control" type="number" name="nilai" placeholder="Nilai"/>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            <a href="{{ action('PersediaanBarangController@index') }}" class="btn btn-default"> Kembali</a>
        </form>
    </div>
</div>
@endsection