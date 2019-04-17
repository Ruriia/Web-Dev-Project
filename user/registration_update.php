<?php
	$dsn = "mysql:host=localhost;dbname=unimedia_kamis";
	$key = new PDO($dsn,"root","");

	$sql = "UPDATE kampus SET nama=?,alamat=?,telepon=? WHERE id=?";

	$result = $key->prepare($sql);
	$data = [
		$_POST['nama'],
		$_POST['alamat'],
		$_POST['telepon'],
		$_POST['id']
	];

	$result->execute($data);

	
?>

<h1>Selamat Data berhasil diubah!!!</h1>

<form action="view.php">
	<br />
	<button>Return</button>	
</form>