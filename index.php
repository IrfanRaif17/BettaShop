<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DASHBOARD | AQUARICH</title>
	<link rel="stylesheet" type="text/css" href="css/stylecss.css">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1> AQUARICH </h1>
			<ul>
				<li><a href="index.php">Dashboard</a></li>
				<li><a href="produk-pembeli.php">Produk</a></li>
				<li><a href="info-kontes.php">Info Kontes</a></li>
				<li><a href="Login_Penjual.php">Login</a></li>
			</ul>
		</div>
	</header>
		
	<!-- content -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- category -->
	<div class="section">
		<div class="container">
			<h4>Kategori</h4>
			<div class="box">
				<?php 
					include 'db.php';
					$kategori = mysqli_query($conn, "SELECT * FROM tb_jenis ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produk.php?kat=<?php echo $k['category_id'] ?>">
						<div class="col-5">
							<img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;">
							<p><?php echo $k['jenis'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>

				<?php 
					include 'db.php';
					$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produk.php?kat=<?php echo $k['kategori_id'] ?>">
						<div class="col-5">
							<img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;">
							<p><?php echo $k['kategori'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- new product -->
	<div class="section">
		<div class="container">
			<h4>Produk Terbaru</h4>
			<div class="box">
				<?php 
					$produk = mysqli_query($conn, "SELECT * FROM tb_produkpenjual WHERE id_status = 1 ORDER BY produk_id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>	
					<a href="detail-produkpembeli.php?id=<?php echo $p['produk_id'] ?>">
						<div class="col-4">
							<img class="produkimg" src="penjual/<?php echo $p['produk_image'] ?>">
							<p class="nama"><?php echo substr($p['produk_name'], 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Produk tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>
		<!-- category -->
		<div class="section">
		<div class="container">
			<h4>Info Kontes</h4>
			<div class="box">
				<?php 
					$produk = mysqli_query($conn, "SELECT * FROM tb_datainfo WHERE produk_status = 1 ORDER BY produk_id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>	
					<a href="detail-kontespembeli.php?id=<?php echo $p['produk_id'] ?>">
						<div class="col-4">
							<img class="produkimg" src="produk/<?php echo $p['produk_image'] ?>">
							<p class="nama"><?php echo substr($p['produk_name'], 0, 20) ?></p>
							<p class="deskripsi"><?php echo substr($p['produk_description'], 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Produk tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - AQUARICH.</small>
		</div>
	</footer>
	
</body>
</html>