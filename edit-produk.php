<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login_Admin.php"</script>';
	}

	$produk = mysqli_query($conn, "SELECT * FROM tb_datainfo WHERE produk_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT KONTES | BAQUARICH</title>
	<link rel="stylesheet" type="text/css" href="css/stylecss.css">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1> AQUARICH </h1>
			<ul>
				<li><a href="dashboard_Admin.php">Dashboard</a></li>
				<li><a href="profile.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Kontes</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Edit Data Kontes</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tb_jenis ORDER BY category_id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected':''; ?>><?php echo $r['jenis'] ?></option>
						<?php } ?>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Nama Kontes" value="<?php echo $p->produk_name ?>" required>
					<input type="text" name="harga" class="input-control" placeholder="prize pool" value="<?php echo $p->harga ?>" required>
					<img src="produk/<?php echo $p->produk_image ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $p->produk_image ?>">
					<input type="file" name="gambar" class="input-control">
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->produk_description ?></textarea><br>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1" <?php echo ($p->produk_status == 1)? 'selected':''; ?>>Aktif</option>
						<option value="0" <?php echo ($p->produk_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga	 	= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];
						$foto 	 	= $_POST['foto'];

						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'produk'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</scrtip>';

							}else{
								unlink('./produk/'.$foto);
								move_uploaded_file($tmp_name, './produk/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($conn, "UPDATE tb_datainfo SET 
												category_id = '".$kategori."',
												produk_name = '".$nama."',
												harga = '".$harga."',
												produk_description = '".$deskripsi."',
												produk_image = '".$namagambar."',
												produk_status = '".$status."'
												WHERE produk_id = '".$p->produk_id."'	");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="data-produk.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}
						
					}
				?>
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
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>