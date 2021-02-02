<?php
session_start();
$user=$_POST["usernya"];
//$tgl_scan=date["Y-m-d"];
// konfigurasi database
error_reporting(E_ALL ^ E_DEPRECATED); 
$conn=mysqli_connect("localhost","root","","pod_kembali_spl");
date_default_timezone_set("Asia/Jakarta");
//mysql_select_db("pod_kembali_spl");
$status=$_POST["status"];
$id=$_POST["awb_no"];
//$_SESSION["scan_by"]=$user;
$tgl = date("Y-m-d H:i:s");
$sql="update stt set status='$status',scan_by='$user',tgl_scan='$tgl' where no_awb='$id' ";
mysqli_query($conn,$sql);

$data = mysqli_query($conn, "SELECT * FROM stt WHERE no_awb='$id'");
$cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['no_awb'] = $id;
       // $_SESSION['status'] = "login";
        header("location:/pod/podkembali/scan");
    }
    else{
        header("location:/pod/podkembali/scan?pesan=gagal");
    }

//echo $_POST["status"];
//echo $_POST["awb_no"];
//echo "ada".$_SESSION['user'];
//header("location:/pod/podkembali/scan");
?>
<script>

</script>
