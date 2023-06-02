<?php 
	require_once 'koneksi.php';

	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	$id_stasiun = $_GET['id_stasiun'];

	$id_stasiun = mysqli_query($koneksi, "DELETE FROM stasiun WHERE id_stasiun = '$id_stasiun'");

	if ($id_stasiun) {
		echo "
			<script>
				alert('Stasiun berhasil dihapus!')
				window.location.href='stasiun.php'
			</script>
		";
		exit;
	} else {
		echo "
			<script>
				alert('Stasiun gagal dihapus!')
				window.history.back()
			</script>
		";
		exit;
	}
?>