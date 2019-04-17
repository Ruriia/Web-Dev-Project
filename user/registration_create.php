<?php
	$dsn = "mysql:host=localhost;dbname=unimedia_kamis_helpdesk";
	$key = new PDO($dsn,"root","");

	$sql = "INSERT INTO ms(nama,alamat,telepon) VALUES (?,?,?)";

	$result = $key->prepare($sql);
	$data = [
		$_POST['nama'],
		$_POST['alamat'],
		$_POST['telfon']
	];
	$result->execute($data);
?>

<h1>Selamat Data Berhasil Dimasukkan ke Database!!!</h1>

<form action="index.php">
	<button>Kembali</button>
</form>
<br />

<form action="view.php">
	<button>View Data</button>
</form>