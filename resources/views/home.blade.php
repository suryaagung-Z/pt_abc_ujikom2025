<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT ABC - Presensi</title>
    <link rel="shortcut icon" href="/assets/images/me.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.dataTables.css">
</head>

<body>
    <div class="container py-5">
        <div class="card w-100" style="width: 18rem;">
            <div class="card-body">
                <h5 class="mb-5 text-center card-title">Data Presensi Pegawai</h5>
                <p class="card-text">
                <div class="mb-3" style="width: 100%; max-width: 500px;">
                    <label for="nip-search" class="form-label">Cari berdasarkan NIP:</label>
                    <input type="text" id="nip-search" class="form-control" placeholder="Masukkan NIP">
                </div>
                <table id="table-pegawai" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function () {
            const table = $('#table-pegawai').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                layout: {
                    topStart: {
                        buttons: ['excel', 'pdf']
                    }
                },
                ajax: {
                    url: "/pegawai/ajax",
                    data: function (d) {
                        d.nip = $('#nip-search').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama', name: 'nama' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                    { data: 'divisi', name: 'divisi' },
                ]
            });

            $('#nip-search').on('keyup change', function () {
                table.draw();
            });
        });
    </script>
</body>

</html>