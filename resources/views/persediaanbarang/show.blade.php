@extends('layout')
@section('content')
<div class="card" style="width : 350px">
    @foreach($persediaanbarang as $pb)
        <img class="card-img-top" src="https://via.placeholder.com/350x150?text={{$pb->kodebarang}}" />
        <div class="card-body">
            <div class="card-title">Nama Barang : {{$pb->namabarang}}</div>
            <p class="card-text">Harga Pokok : {{$pb->hargapokok}}</p>
            <p class="card-text">Harga Jual : {{$pb->hargajual}}</p>
            <p class="card-text">Jumlah : {{$pb->jumlah}}</p>
            <p class="card-text">Nilai : {{$pb->nilai}}</p>
            <a href="{{action('PersediaanBarangController@index')}}" class="btn btn-primary">Back</a>
        </div>
    @endforeach
</div>
@endsection