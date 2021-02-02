<?php
  session_start();
  //session_destroy();
  unset ($_SESSION['user']);
  unset ($_SESSION['nama']);
  unset ($_SESSION['mapping']);
  unset ($_SESSION['email']);
  unset ($_SESSION['perusahaan']);
 echo"<script>alert('Terima kasih telah melakukan absensi')</script>";
  echo"<script>location='index.php'</script>";
?>
