<?php 
	session_start();
	session_destroy();
	echo '<script>window.location="Login_Penjual.php"</script>';
?>