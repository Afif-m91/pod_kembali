<?php
 error_reporting(E_ALL ^ E_DEPRECATED); 
mysql_connect("localhost","root","");
mysql_select_db("pod_kembali_spl");

//fungsi format rupiah 
/**function format_rupiah($rp) {
	$hasil = "Rp." . number_format($rp, 0, "", ".") . ",00";
	return $hasil;
    }**/
    
    
?>