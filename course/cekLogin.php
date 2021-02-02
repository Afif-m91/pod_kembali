<?php
$konek=mysqli_connect("localhost","root","","shella_mii")or die("Koneksi Gagal Periksa Kembali Koneksi");
//mysqli_select_db($konek,"shella_mii")or die("Gagal membuka database periksa kembali database anda");
function no_inject($data)
{
	$filter=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter;
}

$user=no_inject($_POST['email']);
$pass=no_inject($_POST['password']);
//$password=md5($pass);
	
$ada=mysqli_query($konek,"SELECT pesertatraining.KdPeserta,mappingkelasdetail.KdMapping,NamaPeserta,EmailPeserta,NamaPerusahaan
 FROM pesertatraining,mappingkelasdetail where EmailPeserta='$user' and TanggalLahir='$pass' and mappingkelasdetail.KdPeserta=pesertatraining.KdPeserta limit 1");
$login = mysqli_fetch_assoc($ada);
$ok=mysqli_num_rows($ada);
	if($ok==1) 
{
session_start();
  $_SESSION['user']      	= $login['KdPeserta'];
  $_SESSION['nama']         = $login['NamaPeserta'];
  $_SESSION['mapping']         = $login['KdMapping'];
  $_SESSION['email']    	= $login['EmailPeserta'];
  $_SESSION['perusahaan']  = $login['NamaPerusahaan'];

	echo"<script>alert('Selamat Datang, $_SESSION[nama] Diruang Peserta Training Management System')</script>";	
	echo"<script>location='../absenpeserta/create' </script>";
	
} 
else
{
	echo"<script>history.go(-1)</script>";	
}

?>