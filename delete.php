<?php
// Koneksi ke database
$host = '103.219.251.244';
$username = 'lahorasm_root';
$password = '@Lgarin211';
$database = 'lahorasm_root';
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil ID konten yang akan dihapus
$id = $_POST['id'];

// Melakukan penghapusan data
$query = "DELETE FROM konten WHERE id = $id";
if (mysqli_query($conn, $query)) {
    echo "success";
} else {
    echo "error";
}

// Menutup koneksi
mysqli_close($conn);
?>
