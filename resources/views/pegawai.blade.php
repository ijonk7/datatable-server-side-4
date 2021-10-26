<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">DATA PEGAWAI MENGGUNAKAN AJAX DATATABLE</h3>
            </div>
            <div class="card-body">
                <br>
                <!-- MULAI TOMBOL TAMBAH -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Pegawai</button>
                <br><br>
                <!-- AKHIR TOMBOL -->
                <table id="tabel_pegawai" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="tambahModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="formModalTambah">
                    <!-- Modal body -->
                    <div class="modal-body">
                            <input type="hidden" id="id_tambah_pegawai" name="id_pegawai">
                            <div class="form-group">
                                <label for="id_tambah_nama">Nama:</label>
                                <input type="text" class="form-control" id="id_tambah_nama" name="nama">
                                <div id="error_tambah_nama" class="alert alert-danger" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <label for="id_tambah_email">Email:</label>
                                <input type="email" class="form-control" id="id_tambah_email" name="email">
                                <div id="error_tambah_email" class="alert alert-danger" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <label for="id_tambah_alamat">Alamat:</label>
                                <textarea class="form-control" rows="5" id="id_tambah_alamat" name="alamat"></textarea>
                                <div id="error_tambah_alamat" class="alert alert-danger" style="display:none"></div>
                            </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="createData()">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Modal Edit -->

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="formModalEdit">
                    <!-- Modal body -->
                    <div class="modal-body">
                            <input type="hidden" id="id_edit_pegawai" name="id_pegawai">
                            <div class="form-group">
                                <label for="id_edit_nama">Nama:</label>
                                <input type="text" class="form-control" id="id_edit_nama" name="nama">
                                <div id="error_edit_nama" class="alert alert-danger" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <label for="id_edit_email">Email:</label>
                                <input type="text" class="form-control" id="id_edit_email" name="email">
                                <div id="error_edit_email" class="alert alert-danger" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <label for="id_edit_alamat">Alamat:</label>
                                <textarea class="form-control" rows="5" id="id_edit_alamat" name="alamat"></textarea>
                                <div id="error_edit_alamat" class="alert alert-danger" style="display:none"></div>
                            </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="saveData()">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Modal Edit -->

    <!-- Modal Hapus -->
    {{-- <div class="modal fade" id="hapusModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="/action_page.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}
    <!-- Modal Hapus -->

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        // END: CSRF TOKEN

        // Inisialisasi Datatable
        $(document).ready(function() {
            $('#tabel_pegawai').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "{{ route('pegawai.index') }}",
                    type: 'GET'
                },
                "columns": [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
		                orderable: false
                    },

                ],
                order: [
                    [0, 'asc']
                ]
            } );
        } );
        // END: Inisialisasi Datatable

        // Untuk menghapus alert error ketika modal ditutup lalu dibuka kembali
        $('#tambahModal').on('hidden.bs.modal', function () {
                $("#error_tambah_nama").hide();
                $("#error_tambah_email").hide();
                $("#error_tambah_alamat").hide();
            // $('#tambahModal form')[0].reset();
        });

        $('#editModal').on('hidden.bs.modal', function () {
                $("#error_edit_nama").hide();
                $("#error_edit_email").hide();
                $("#error_edit_alamat").hide();
            // $('#editModal form')[0].reset();
        });
        // END: Untuk menghapus alert error ketika modal ditutup lalu dibuka kembali

        // Save data pegawai
        function createData() {
            allInput = $('#formModalTambah').serializeArray();
            $('input').val('');
            $('textarea').val('');
            $.ajax({
                type: 'POST',
                data: allInput,
                url: "{{ route('pegawai.create') }}",
                dataType: 'json',
                success: function (result) {
                    var oTable = $('#tabel_pegawai').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
                    $('#tambahModal').modal('hide'); //modal hide
                    Swal.fire(
                        'Sukses!',
                        'Data berhasil disimpan!',
                        'success'
                    )
                },
                error: function (data) {
                    var oTable = $('#tabel_pegawai').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
                    
                    $("#error_tambah_nama").html('');
                    $("#error_tambah_nama").hide();
                    $("#error_tambah_email").html('');
                    $("#error_tambah_email").hide();
                    $("#error_tambah_alamat").html('');
                    $("#error_tambah_alamat").hide();

                    json = $.parseJSON(data.responseText);
                    $.each(json.errors, function(key, value){
                        $('#error_tambah_'+key+'').show();
                        $('#error_tambah_'+key+'').append(value);
                    });
                
                    $("#id_tambah_nama").val(allInput[1].value);
                    $("#id_tambah_email").val(allInput[2].value);
                    $("#id_tambah_alamat").val(allInput[3].value);

                    // $('#tambahModal').modal('hide'); //modal hide
                    // Swal.fire(
                    //     'Gagal!',
                    //     'Data gagal disimpan!',
                    //     'error'
                    // )
                }
            });
        };
        // END: Save data pegawai

        // Show data di Modal Pegawai
        function getData(id_pegawai) {
            $('input').val('');
            $('textarea').val('');
            $.ajax({
                type: 'POST',
                data: 'id='+id_pegawai,
                url: "{{ route('pegawai.show') }}",
                dataType: 'json',
                success: function (result) {
                    $('[id="id_edit_pegawai"]').val(result.id);
                    $('[id="id_edit_nama"]').val(result.nama);
                    $('[id="id_edit_email"]').val(result.email);
                    $('[id="id_edit_alamat"]').val(result.alamat);
                }
            });
          }
        // END: Show data di Modal Pegawai

        // Save data pegawai
        function saveData() {
            allInput = $('#formModalEdit').serializeArray();
            $.ajax({
                type: 'POST',
                data: allInput,
                url: "{{ route('pegawai.update') }}",
                dataType: 'json',
                success: function (result) {
                    var oTable = $('#tabel_pegawai').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
                    $('#editModal').modal('hide'); //modal hide
                    Swal.fire(
                        'Sukses!',
                        'Data berhasil disimpan!',
                        'success'
                    )
                },
                error: function (data) {
                    var oTable = $('#tabel_pegawai').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
                    
                    $("#error_edit_nama").html('');
                    $("#error_edit_nama").hide();
                    $("#error_edit_email").html('');
                    $("#error_edit_email").hide();
                    $("#error_edit_alamat").html('');
                    $("#error_edit_alamat").hide();

                    json = $.parseJSON(data.responseText);
                    $.each(json.errors, function(key, value){
                        $('#error_edit_'+key+'').show();
                        $('#error_edit_'+key+'').append(value);
                    });
                
                    $("#id_edit_nama").val(allInput[1].value);
                    $("#id_edit_email").val(allInput[2].value);
                    $("#id_edit_alamat").val(allInput[3].value);

                    // $('#editModal').modal('hide'); //modal hide
                    // Swal.fire(
                    //     'Gagal!',
                    //     'Data gagal disimpan!',
                    //     'error'
                    // )
                }
            });
        };
        // END: Save data pegawai

        // Save data pegawai
        function deleteData(id_pegawai) {
            Swal.fire({
                title: 'Apa Anda yakin ?',
                text: "Data pegawai akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        data: 'id='+id_pegawai,
                        url: "{{ route('pegawai.delete') }}",
                        dataType: 'json',
                        success: function (data) {
                            var oTable = $('#tabel_pegawai').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        },
                        error: function (data) {
                            var oTable = $('#tabel_pegawai').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus!',
                                'error'
                            )
                        }
                    });
                }
            })
        };
        // END: Save data pegawai
    </script>
</body>
</html>
