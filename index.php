<!DOCTYPE HTML>
<html>

<head>
	<title>Miles Galery By Lgarin211</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />

	<meta content="Agustinus Pardamean Lumban Tobing" name="description">
	<meta content="Miles Galery,Miles,lgarin211, Agustinus, Agustinus Pardamean Lumban Tobing, Agustinus Pardamean, Tobing" name="keywords">
	<meta name="author" content="Miles Galery, Agustinus Pardamean Lumban Tobing, lgarin211">

	<!-- Open Graph Meta Tags -->
	<meta property="og:title" content="lgarin211 - Miles Galery">
	<meta property="og:description" content="This is my total best artwork i created yet. Enjoy!.">
	<meta property="og:image" content="https://milesdash.afergus.live/uploads/20230707_64a775aa1b6ab.png">
	<meta property="og:url" content="https://afergus.live">
	<meta property="og:type" content="website">

	<!-- Twitter Meta Tags -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="lgarin211 - Miles Galery">
	<meta name="twitter:description" content="This is my total best artwork i created yet. Enjoy!.">
	<meta name="twitter:image" content="https://milesdash.afergus.live/uploads/20230707_64a775aa1b6ab.png">
	<meta name="twitter:creator" content="@lgarin211">

	<!-- Other Meta Tags -->
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<meta name="revisit-after" content="3 days">
	<meta name="language" content="Indonesian">
	<meta name="distribution" content="global">
	<meta name="rating" content="general">
	<meta name="csrf-token" content="token_csrf">

	<meta name="theme-color" content="#712cf9">



	<!-- fav icon -->
	<link rel="shortcut icon" href="https://milesdash.afergus.live/uploads/20230707_64a775aa1b6ab.png" type="image/x-icon">
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<h1><a href="#"><strong>Miles Galery</strong></a><br><a href="https://afergus.live"> by Lgarin Store</a></h1>
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
			$host = '103.219.251.244';
			$username = 'lahorasm_root';
			$password = '@Lgarin211';
			$database = 'lahorasm_root';
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
                                <a href="' . $row['link_gambar'] . '" class="image"><img src="' . $row['link_gambar'] . '" alt="" /></a>
                                <h2>' . $row['judul'] . '</h2>
                                <p>' . $row['deskripsi'] . '<a href="' . $row['link_gambar'] . '">' . $row['link_gambar'] . '</a> </p>
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
						<h2><img src="uploads/20230707_64a775d62a942.png" alt="" style="width: 20rem;"></h2>
						<p>This is my total best artwork i created yet. Enjoy!.</p>
					</section>
					<section>
						<h2>Also check my social media ...</h2>
						<ul class="icons">
							<li><a href="https://www.youtube.com/@Milesdash25" class="icon brands fa-youtube"><span class="label">YouTube</span></a></li>
							<li><a href="https://twitter.com/i/flow/login?redirect_after_login=%2FFadastudio25" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.instagram.com/milesdash25/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
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