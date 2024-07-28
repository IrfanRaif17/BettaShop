<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DAFTAR | AQUARICH </title>
	<link rel="stylesheet" type="text/css" href="css/stylecss.css">
</head>

<body id="bg-login">
	<div class="box-login_penjual">
		<h2>Daftar Penjual</h2>
		<form action="" method="POST">
			<p1>Username</p1>
			<input type="text" name="user" placeholder="Username" class="input-control">
			<p1>Nama Pemilik</p1>
			<input type="NamaPemilik" name="pemilik" placeholder="Nama Pemilik" class="input-control">
            <p1>Nama Toko</p1>
			<input type="namatoko" name="toko" placeholder="Nama Toko" class="input-control">
			<p1>Alamat</p1>
			<input type="alamat" name="alamat" placeholder="alamat" class="input-control">
            <p1>Email</p1>
			<input type="mail" name="email" placeholder="Email" class="input-control">
			<p1>No Tlp / Wa</p1>
			<input type="tlp" name="tlp" placeholder="No Tlp / Wa" class="input-control">
            <p1>Password</p1>
			<input type="password" name="pass1" placeholder="Password" class="input-control">
            <p1>Konfirmasi Password</p1>
			<input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-control">
			<p>Sudah Memiliki Akun ? Klik <a class="loginlink" href="/bettashop/login_Penjual.php">di sini</a></p>
			<input type="submit" name="daftar" value="Daftar" class="btn" id="btn">
		</form>
		<?php 
			if(isset($_POST['daftar'])){
                session_start();
				include 'db.php';

				$user 	    = $_POST['user'];
                $pemilik 	= ucwords($_POST['pemilik']);
                $toko       = $_POST['toko'];
				$alamat     = ucwords($_POST['alamat']);
                $email 	    = $_POST['email'];
                $tlp 	    = $_POST['tlp'];
                $pass1 	    = $_POST['pass1'];
				$pass2 	    = $_POST['pass2'];

						$insert = mysqli_query($conn, "INSERT INTO tb_penjual (user, pemilik, toko, tlp, email, alamat, pass1)
						VALUES ('$user','$pemilik','$toko','$tlp','$email','$alamat','$pass1');

										username        = '".$user."',
                                        penjual_name      = '".$pemilik."',
                                        nama_toko    	= '".$toko."',
										penjual_tlp       = '".$tlp."',
										penjual_email     = '".$email."',
										penjual_address   = '".$alamat."'
                                        password        = '".MD5($pass1)."' ");
                                        
						if($insert){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="bettashop/penjual/Login_Penjual.php"</script>';

						}else{
							echo 'gagal '.mysqli_error($conn);
                            }
						}

				?>
	</div>
</body>

</html>