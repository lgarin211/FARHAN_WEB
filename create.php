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

// Mengambil data dari form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$link_luar = $_POST['link_luar'];
$link_gambar = $_POST['link_gambar'];

// Menyimpan data ke dalam database
$query = "INSERT INTO N_F_galery (judul, deskripsi, link_luar, link_gambar) VALUES ('$judul', '$deskripsi', '$link_luar', '$link_gambar')";
if (mysqli_query($conn, $query)) {
    echo "success";
} else {
    echo "error";
}

// Menutup koneksi
mysqli_close($conn);
?>
