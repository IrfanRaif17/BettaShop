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
	<title>KATEGORI | AQUARICH</title>
	<link rel="stylesheet" type="text/css" href="css/stylecss.css">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1> AQUARICH </h1>
			<ul>
				<li><a href="dashboard_penjual.php">Dashboard</a></li>
				<li><a href="#">Profil</a></li>
				<li><a href="data-kategoripenjual.php">Data Kategori</a></li>
				<li><a href="produk_penjual.php">Data Produk</a></li>
				<li><a href="keluar-penjual.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Data Kategori</h3>
			<div class="box">
				<button><a href="tambah-kategoripenjual.php">Tambah Data</a></button>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$jenis = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
							if(mysqli_num_rows($jenis) > 0){
							while($row = mysqli_fetch_array($jenis)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['kategori'] ?></td>
							<td>
							<i class="fa-sharp fa-solid fa-pen-to-square"></i><a href="edit-kategoripenjual.php?id=<?php echo $row['kategori_id'] ?>">Edit</a> || <a href="hapus-penjual.php?idk=<?php echo $row['kategori_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="3">Tidak ada data</td>
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
</body>
</html>