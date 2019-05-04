<?php
    header("refresh: 2; index.php");
?>
<script src="../user/dist/sweetalert2.all.min.js"></script>

<script>
  function sweetclick(){
    Swal.fire({
      type: 'success',
      title: 'Update Berhasil!',
      showConfirmButton: false,
      timer: 3000,
  })
  }
  window.onload = sweetclick;
</script>
