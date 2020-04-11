<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax CRUD Gudang Barang</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
</head>
<body>
    <p><br/></p>
    <div class="container">
        <p>
            <h1>AJAX CRUD Gudang Barang</h1>
        </p>
        <div class="row">
            <div class="col-md-8">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Pokok</th>
                            <th>Harga Jual</th>
                            <th>Jumlah</th>
                            <th>Nilai</th>
                            <th>Action</th>
                        <tr>
                    </thead>
                    <tbody></tbody>
                <table>
            </div>
            <div class="col-md-4">
                <form>
                    <div class="form-group myid">
                        <label>ID</label>
                        <input type="number" id="id" class="form-control" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" id="kodebarang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" id="namabarang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga Pokok</label>
                        <input type="number" id="hargapokok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" id="hargajual" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" id="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" id="nilai" class="form-control">
                    </div>
                    <button type="button" id="save" onclick="saveData()" class="btn btn-primary">Submit</button>
                    <button type="button" id="update" onclick="updateData()" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#datatable').DataTable();
        $('#save').show();
        $('#update').hide();
        $('.myid').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
            }
        });

        function viewData(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/cruds",
                success: function(response){
                    var rows = "";
                    $.each(response, function(key, value){
                        rows = rows + "<tr>";
                        rows = rows + "<td>"+value.id+"</td>";
                        rows = rows + "<td>"+value.kodebarang+"</td>";
                        rows = rows + "<td>"+value.namabarang+"</td>";
                        rows = rows + "<td>"+value.hargapokok+"</td>";
                        rows = rows + "<td>"+value.hargajual+"</td>";
                        rows = rows + "<td>"+value.jumlah+"</td>";
                        rows = rows + "<td>"+value.nilai+"</td>";
                        rows = rows + "<td width='180'>";
                        rows = rows + "<button type='button' class='btn btn-warning' onclick='editData("+value.id+", "+value.kodebarang+", "+value.namabarang+", "+value.hargapokok+", "+value.hargajual+", "+value.jumlah+", "+value.nilai+")'>Edit</button>"
                        rows = rows + "<button type='button' class='btn btn-danger' onclick='deleteData("+value.id+")'>Delete</button>"
                        rows = rows + "</td></tr>";
                    });
                    $('tbody').html(rows);
                }
            })
        }

        viewData();

        function saveData(){
            var kodebarang = $('#kodebarang').val();
            var namabarang = $('#namabarang').val();
            var hargapokok = $('#hargapokok').val();
            var hargajual = $('#hargajual').val();
            var jumlah = $('#jumlah').val();
            var nilai = $('#nilai').val();
            $.ajax({
                type: 'POST',
                dataType: 'json'
                data: {kodebarang:kodebarang, namabarang:namabarang, hargapokok:hargapokok, 
                    hargajual:hargajual, jumlah:jumlah, nilai:nilai },
                url: '/cruds',
                success: function(response){
                    viewData();
                    clearData();
                    ${'#save'}.show();
                }
            })
        }

        function clearData(){
            $('#id').val('');
            $('#kodebarang').val('');
            $('#namabarang').val('');
            $('#hargapokok').val('');
            $('#hargajual').val('');
            $('#jumlah').val('');
            $('#nilai').val('');
        }

        function editData(id){
            $('#save').hide();
            $('#update').show();
            $('#.myid').show();
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/cruds/"+id+"/edit",
                success: function(response){
                    $('#id').val(response.id);
                    $('#kodebarang').val(response.kodebarang);
                    $('#namabarang').val(response.namabarang);
                    $('#hargapokok').val(response.hargapokok);
                    $('#hargajual').val(response.hargajual);
                    $('#jumlah').val(response.jumlah);
                    $('#nilai').val(response.nilai);
                }
            })
            
        }

        function updateData(){
            var id = $('#id').val();
            var kodebarang = $('#kodebarang').val();
            var namabarang = $('#namabarang').val();
            var hargapokok = $('#hargapokok').val();
            var hargajual = $('#hargajual').val();
            var jumlah = $('#jumlah').val();
            var nilai = $('#nilai').val();
            $.ajax({
                type: "PUT",
                dataType: "json",
                data: {kodebarang:kodebarang, namabarang:namabarang, hargapokok:hargapokok, hargajual:hargajual, jumlah:jumlah, nilai:nilai},
                url: "/cruds"+id, 
                success: function(response){
                    viewData();
                    clearData();
                    $('#save').show();
                    $('#update').hide();
                    $('.myid').hide();
                }
            })
        }

        function deleteData(id){
            $.ajax({
                type: "DELETE",
                dataType: "json",
                url: '/cruds/'+id,
                success: function(response){
                    viewData();
                }
            })
        }
    </script>
</body>
</html>
