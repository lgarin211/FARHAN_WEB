<!DOCTYPE html>
<html>
<head>
    <title>Drive Penyimpanan Gambar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .image-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Drive Penyimpanan Gambar</h1>
        <div class="mt-4">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Pilih Gambar:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
        <h2 class="mt-5">Gambar yang Telah Diunggah:</h2>
        <div class="row mt-4">
            <?php
            $images = scandir('uploads/');
            $counter = 0;
            foreach ($images as $image) {
                if ($image !== '.' && $image !== '..') {
                    $imageUrl = 'uploads/' . $image;
                    if ($counter % 4 === 0) {
                        echo '</div><div class="row">';
                    }
                    echo '<div class="col-md-3">';
                    echo '<div class="image-container">';
                    echo '<img src="' . $imageUrl . '" class="img-thumbnail" width="200px">';
                    echo '<br>';
                    echo '<input type="text" class="form-control" value="' . $imageUrl . '" readonly>';
                    echo '</div>';
                    echo '</div>';
                    $counter++;
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
