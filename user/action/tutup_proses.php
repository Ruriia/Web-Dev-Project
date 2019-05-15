<?php
	require '../../admin/action/databasekey.php';

	$key = connection();

	$sql = "UPDATE ticket SET done = 2 WHERE ticketid = ?";

	$run = $key->prepare($sql);

	$run->execute([$_GET['number']]);

	header("refresh: 3; ../halaman_ticket.php");
?>	

<script src="../dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/animate.css">
<script>
  function sweetclick(){
    Swal.fire({
      type: 'success',
      title: 'Thank You For using HelpDesk Ticket Support!!',
      showConfirmButton: false,
      timer: 4000,
  })
  }
  window.onload = sweetclick;
</script>