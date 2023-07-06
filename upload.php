<?php
$targetDir = 'uploads/';
$extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
$newFileName = date("Ymd") . '_' . uniqid() . '.' . $extension;
$targetFile = $targetDir . $newFileName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Cek apakah file adalah gambar valid
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }
}

// Cek apakah file sudah ada
if (file_exists($targetFile)) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}

// Batasi jenis file yang diizinkan (dalam contoh ini hanya gambar)
$allowedFormats = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
    $uploadOk = 0;
}

// Cek apakah terjadi kesalahan saat proses upload
if ($uploadOk == 0) {
    echo "Maaf, file tidak berhasil diunggah.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "File " . basename($_FILES["image"]["name"]) . " berhasil diunggah.";
        // redirect back
        header("Location: up.php");
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}
?>
