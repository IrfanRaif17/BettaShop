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
	<title>TAMBAH PRODUK | AQUARICH</title>
	<link rel="stylesheet" type="text/css" href="css/stylecss.css">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
			<h3>Tambah Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['kategori_id'] ?>"><?php echo $r['kategori'] ?></option>
						<?php } ?>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Nama Ikan" required>
					<input type="text" name="harga" class="input-control" placeholder="harga" required>
                    <input type="text" name="stok" class="input-control" placeholder="stok" required>
					<input type="file" name="gambar" class="input-control" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar']);
						// menampung inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga		= $_POST['harga'];
                        $stok       = $_POST['stok'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];

						// menampung data file yang diupload
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'penjual'.time().'.'.$type2;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						// validasi format file
						if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</scrtip>';

						}else{
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name, './penjual/'.$newname);

						$insert = mysqli_query($conn, "INSERT INTO `tb_produkpenjual` VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')
										null,
										'".$kategori."',
										'".$nama."',
										'".$harga."',
                                        '".$stok."',
										'".$deskripsi."',
										'".$newname."',
										'".$status."',
										null
											) ");
							if($insert){
								echo '<script>alert("Tambah data berhasil")</script>';
								echo '<script>window.location="produk_penjual.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}
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