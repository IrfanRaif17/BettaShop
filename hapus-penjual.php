<?php 
	
	include 'db.php';

	if(isset($_GET['idk'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE kategori_id = '".$_GET['idk']."' ");
		echo '<script>window.location="data-kategoripenjual.php"</script>';
	}

	if(isset($_GET['idp'])){
		$produk = mysqli_query($conn, "SELECT produk_image FROM tb_produkpenjual WHERE produk_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);

		unlink('./penjual/'.$p->produk_image);

		$delete = mysqli_query($conn, "DELETE FROM tb_produkpenjual WHERE produk_id = '".$_GET['idp']."' ");
		echo '<script>window.location="produk_penjual.php"</script>';
	}

?>