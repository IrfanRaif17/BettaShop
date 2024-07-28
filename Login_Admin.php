<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN ADMIN | AQUARICH </title>
	<link rel="stylesheet" type="text/css" href="css/stylecss.css">
</head>

<body id="bg-login">
	<div class="box-login">
		<h2>Login Admin</h2>
		<form action="" method="POST">
			<p1>Username</p1>
			<input type="text" name="user" placeholder="Username" class="input-control">
			<p1>Password</p1>
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<p>Belum punya akun ? Daftar <a href="/bettashop/dashboard_admin.php">di sini</a></p>
			<input type="submit" name="submit" value="Login" class="btn" id="btn">
		</form>
		<?php 
			if(isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->admin_id;
					echo '<script>window.location="dashboard_admin.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}

			}
		?>
	</div>
</body>

</html>