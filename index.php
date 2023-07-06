
<!DOCTYPE HTML>
<html>
	<head>
		<title>Farhan By Lgarin211</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <!-- fav icon -->
        <link rel="shortcut icon" href="https://lgarin211.github.io/assets/img/portfolio/pp%20(2).jpg" type="image/x-icon">
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="#"><strong>Judul Websitenya</strong></a>|<a href="https://afergus.live">Agustinus Pardamean Lumban Tobing</a></h1>
						<nav>
							<ul>
								<li><a href="#footer" class="icon solid fa-info-circle">About</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">
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
                        echo '<article class="thumb">
                                <a href="'.$row['link_gambar'].'" class="image"><img src="'.$row['link_gambar'].'" alt="" /></a>
                                <h2>'.$row['judul'].'</h2>
                                <p>'.$row['deskripsi'].'<a href="'.$row['link_gambar'].'">'.$row['link_gambar'].'</a> </p>
                              </article>';
                    }

                    // Menutup koneksi
                    mysqli_close($conn);
                    ?>
					</div>
				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div>
								<section>
									<h2>JUDUL WEBNYA</h2>
									<p>INI WEB APA.</p>
								</section>
								<section>
									<h2>Follow me on ...</h2>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
										<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
										<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
									</ul>
								</section>
								<h3 class="">
									&copy; WEB INI DI BUAT DAN DI KEMBANGAN OLEH : <br> <a href="https://afergus.live">Agustinus Pardamean Lumban Tobing</a>.
								</h3>
							</div>
							<div>
								<section>
								</section>
							</div>
						</div>
					</footer>

			</div>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>