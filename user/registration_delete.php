<?php
	$alamat = "mysql:host=localhost;dbname=unimedia_kamis";
	$key = new PDO($alamat, "root","");

	$sql = "DELETE from kampus where id=?";
	$data = [
		$_GET['id']];
	$result = $key->prepare($sql);
	$result->execute($data);

?>

<h1>Selamat Data Berhasil Dihapus!!!</h1>

<form action="view.php">
	<br />
	<button>Return</button>	
</form>
