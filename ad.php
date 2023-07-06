<!DOCTYPE html>
<html>
<head>
    <title>Data Konten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-delete').on('click', function() {
                var row = $(this).closest('tr');
                var judul = row.find('.judul').text();

                if (confirm("Anda yakin ingin menghapus konten '" + judul + "'?")) {
                    var id = row.find('.id').text();

                    // Kirim permintaan penghapusan ke server
                    $.ajax({
                        url: 'delete.php',
                        type: 'POST',
                        data: { id: id },
                        success: function(response) {
                            if (response === 'success') {
                                row.remove();
                                alert("Konten '" + judul + "' berhasil dihapus.");
                            } else {
                                alert("Gagal menghapus konten.");
                            }
                        },
                        error: function() {
                            alert("Terjadi kesalahan dalam menghapus konten.");
                        }
                    });
                }
            });

            // Tampilkan modal tambah data
            $('#btn-add').on('click', function() {
                $('#modal-add').modal('show');
            });

            // Kirim data tambah ke server
            $('#form-add').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'create.php',
                    type: 'POST',
                    data: $('#form-add').serialize(),
                    success: function(response) {
                        if (response === 'success') {
                            $('#modal-add').modal('hide');
                            location.reload();
                        } else {
                            alert("Gagal menambahkan konten.");
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan dalam menambahkan konten.");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Data Konten</h1>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Link Luar</th>
                        <th>Link Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'N_F_foto';
                    $conn = mysqli_connect($host, $username, $password, $database);

                    // Memeriksa koneksi
                    if (!$conn) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    // Mengambil data dari database
                    $query = "SELECT id, judul, deskripsi, link_luar, link_gambar FROM N_F_galery";
                    $result = mysqli_query($conn, $query);

                    // Menampilkan data ke dalam tabel
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='id'>" . $row['id'] . "</td>";
                        echo "<tr>";
                        echo "<td class='judul'>" . $row['judul'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td><a href='" . $row['link_luar'] . "' target='_blank'>Kunjungi</a></td>";
                        echo "<td><img src='" . $row['link_gambar'] . "' width='100px'></td>";
                        echo "<td><button class='btn btn-danger btn-delete'>Hapus</button></td>";
                        echo "</tr>";
                    }

                    // Menutup koneksi
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
        <button id="btn-add" class="btn btn-primary">Tambah Konten</button>

        <!-- Modal Tambah Konten -->
        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-add-label">Tambah Konten</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-add">
                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link_luar">Link Luar:</label>
                                <input type="text" class="form-control" id="link_luar" name="link_luar" required>
                            </div>
                            <div class="form-group">
                                <label for="link_gambar">Link Gambar <a href="up.php" target="_blank">upload di sini</a> :</label>
                                <input type="text" class="form-control" id="link_gambar" name="link_gambar" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
