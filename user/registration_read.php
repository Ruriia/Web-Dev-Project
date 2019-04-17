<?php
	$dsn = "mysql:host=localhost;dbname=unimedia_kamis";
	$key = new PDO($dsn,"root","");

	$sql = "SELECT * FROM kampus";

	$result = $key->prepare($sql);
	$result->execute();
?>

<table border="1">
	<tr>
		<th>No. </th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Telefon</th>
		<th>Pilihan</th>
	</tr>

	<?php
	$i = 0;
	while($data = $result->fetch()):
	$i++;
	?>

	<tr>
		<td><?= $i?></td>
		<td><?= $data['nama']; ?></td>
		<td><?= $data['alamat']; ?></td>
		<td><?= $data['telepon']; ?></td>
		<td>
			<a href="edit.php?id=<?=$data['id']; ?>">Ubah data</a> ||
			<a href="delete.php?id=<?=$data['id']; ?>">Hapus data</a>
		</td>
	</tr>
	<?php endwhile?>
</table>

<form action="index.php">
	<br />
	<button>Silahkan Masukkan Data Kembali</button>
</form>