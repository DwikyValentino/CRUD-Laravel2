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
        @foreach($persediaanbarang as $pb)
            <form action="{{ action('PersediaanBarangController@update', $pb->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kodebarang" class="form-control" value="{{ $pb->kodebarang }}">
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="namabarang" class="form-control" value="{{ $pb->namabarang }}">
                </div>
                <div class="form-group">
                    <label>Harga Pokok</label>
                    <input type="text" name="hargapokok" class="form-control" value="{{ $pb->hargapokok }}">
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" name="hargajual" class="form-control" value="{{ $pb->hargajual }}">
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" value="{{ $pb->jumlah }}">
                </div>
                <div class="form-group">
                    <label>Nilai</label>
                    <input type="text" name="nilai" class="form-control" value="{{ $pb->nilai }}">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ action('PersediaanBarangController@index') }}" class="btn btn-default">Back</a>
            </form>
        @endforeach
    </div>
</div>