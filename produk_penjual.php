<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login_Admin.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PRODUK | AQUARICH</title>
	<link rel="stylesheet" type="text/css" href="css/stylecss.css">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1> AQUARICH </h1>
			<ul>
				<li><a href="dashboard_penjual.php">Dashboard</a></li>
				<li><a href="profile-penjual.php">Profil</a></li>
				<li><a href="data-kategoripenjual.php">Data Kategori</a></li>
				<li><a href="produk_penjual.php">Data Produk</a></li>
				<li><a href="keluar-penjual.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Data Produk</h3>
			<div class="box">
				<button><a href="tambah-produkpenjual.php">Tambah Data</a></button>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Gambar</th>
							<th>Status</th>
							<th>stok</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_produkpenjual LEFT JOIN tb_kategori USING (kategori_id) ORDER BY produk_id DESC");
							if(mysqli_num_rows($produk) > 0){
							while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['kategori'] ?></td>
							<td><?php echo $row['produk_name'] ?></td>
							<td>Rp. <?php echo number_format($row['harga']) ?></td>
							<td><a href="penjual/<?php echo $row['produk_image'] ?>" target="_blank"> <img src="penjual/<?php echo $row['produk_image'] ?>" width="80px"> </a></td>
							<td><?php echo ($row['id_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
							<td><?php echo $row['stok'] ?></td>
							<td>
								<a href="edit-produkpenjual.php?id=<?php echo $row['produk_id'] ?>">Edit</a> || <a href="hapus-penjual.php?idp=<?php echo $row['produk_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="7">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - AQUARICH.</small>
		</div>
	</footer>
	<script>
            CKEDITOR.replace( 'editor1' );
    </script>
</body>
</html>