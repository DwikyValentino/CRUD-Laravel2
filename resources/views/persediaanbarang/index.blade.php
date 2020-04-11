@extends('layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-succes">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <h1>CRUD Gudang Barang</h1>
    </div>
    <div class="col-md-4">
        <form action="/search" method="GET">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    </div>
    <div class="col-md-2 text-right">
        <a href="{{ action('PersediaanBarangController@create') }}" class="btn btn-primary"> + Tambah Data</a>
    </div>
</div>
<form method="POST">
    @csrf
    @method('DELETE')
    <button formaction="/deleteall" type="submit" class="btn btn-danger">Delete All Selected</button>
<table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" class="selectall"></th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Pokok</th>
            <th>Harga Jual</th>
            <th>Jumlah</th>
            <th>Nilai</th>
            <th width="230">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($persediaanbarang as $pb)
        <tr>
            <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $pb -> id }}"></td>
            <td>{{ $pb -> kodebarang}}</td>
            <td>{{ $pb -> namabarang}}</td>
            <td>{{ $pb -> hargapokok}}</td>
            <td>{{ $pb -> hargajual}}</td>
            <td>{{ $pb -> jumlah}}</td>
            <td>{{ $pb -> nilai}}</td>
            <td>
                <a href="{{ action('PersediaanBarangController@show', $pb->id) }}" class="btn btn-show">Show</a>
                <a href="{{ action('PersediaanBarangController@edit', $pb->id) }}" class="btn btn-warning">Ubah</a>
                <button formaction="{{ action('PersediaanBarangController@destroy', $pb->id) }}" type="submit" class="btn btn-danger">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th><input type="checkbox" class="selectall2"></th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Pokok</th>
            <th>Harga Jual</th>
            <th>Jumlah</th>
            <th>Nilai</th>
            <th width="230">Action</th>
        </tr>
    </tfoot>
</table>
</form>
Halaman : {{ $persediaanbarang->currentPage() }} <br/>
Jumlah Data : {{ $persediaanbarang->total() }} <br/>
Data Per Halaman : {{ $persediaanbarang->perPage() }} <br/>

{{ $persediaanbarang->links() }}

<script type="text/javascript">
    $('.selectall').click(function(){
        $('.selectbox').prop('checked', $(this).prop('checked'));
        $('.selectall2').prop('checked', $(this).prop('checked'));
    })
    $('.selectall2').click(function(){
        $('.selectbox').prop('checked', $(this).prop('checked'));
        $('.selectall').prop('checked', $(this).prop('checked'));
    })
    $('.selectbox').change(function(){
        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').length;
        if(total == number){
            $('.selectall').prop('checked', true);
            $('.selectall2').prop('checked', true);
        }else{
            $('.selectall').prop('checked', false);
            $('.selectall2').prop('checked', false);
        }
    })
</script>

@endsection