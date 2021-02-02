<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
 <link rel="shortcut icon" href="../web/pav.png">
 <?php include "head.php"; ?>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php include "header.php"; ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	 
              	  	
                  <?php include 'menu.php'; ?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Data &raquo; Import STT</h3><br /><br />
          	<h3> Silahkan Download Template Excel 2003 </h3>
			<a href="Template_Excel.xls" type="button" class="btn btn-primary" target="" >
		<span class="fa fa-cloud-download"></span> Download Template </a> 
              <!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Import STT</h3> 
                        </div>
                        
                        <div class="panel-body">
                        <div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Pastikan Extensi File Excel yang digunakan excel 2003 (.xls)</a></h4></div>
          <?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
//mysql_connect('localhost', 'username', 'password');
//mysql_select_db('namadatabase');
 
//memanggil file excel_reader
require "excel_reader.php";
 $connect = mysqli_connect("localhost", "root", "", "pod_kembali_spl") or die("Error " . mysqli_error($connection));

//jika tombol import ditekan
if(isset($_POST['submit'])){
 
 
    $target = basename($_FILES['filereportpod']['name']) ;
    move_uploaded_file($_FILES['filereportpod']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filereportpod']['name'],false);
    
//    menghitung jumlah baris file xlsbiatinss
    $baris = $data->rowcount($sheet_index=0);
   // nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

//memmanggil array pada tabel stt
$sql = mysql_query ("SELECT no_awb FROM stt");
//$listGagal = mysql_fetch_row($sql) 
//echo "Jumlah data: ". $listGagal[0]. "<br/>";
while ($listGagal = mysql_fetch_row($sql)) 
//echo "Jumlah data: ". $listGagal[0]. "<br/>";
$listGagal =[];

  
//    jika kosongkan data dicentang jalankan kode berikut
  //  $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
  //  if($drop == 1){
//             kosongkan tabel pegawai
   //          $truncate ="TRUNCATE TABLE stt";
   //          mysql_query($truncate);
   // };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {   
//       membaca data (kolom ke-1 sd terakhir)
	  $kd_stt           = $data->val($i, 1);
      $no_awb           = $data->val($i, 2);
      $no_do   	  		= $data->val($i, 3);
      $cart_id			= $data->val($i, 4);
      $id_pengirim  	= $data->val($i, 5);
      $penerima    		= $data->val($i, 6);
      $alamat_penerima  = $data->val($i, 7);
      $kota				= $data->val($i, 8);
      $kilo  			= $data->val($i, 9);
      $koli  			= $data->val($i, 10);
      $tgl_kirim  		= $data->val($i, 11);
      $tgl_terima  		= $data->val($i, 12);
      $nama_penerima  	= $data->val($i, 13);
      $jenis_barang  	= $data->val($i, 14);
      $remarks  		= $data->val($i, 15);
      $keterangan    	= $data->val($i, 16);
      
// 	Manipulasi Kutip Pada Excel	
	$alamat= str_replace("'", "", $alamat_penerima);
	$nama= str_replace("'", "", $nama_penerima);
	
//      setelah data dibaca, masukkan ke tabel STT sql
      $query = "INSERT INTO stt (kd_stt, no_awb, no_do, cart_id, id_pengirim, penerima, alamat_penerima, kota, kilo, koli, tgl_kirim, tgl_terima, nama_penerima, jenis_barang, remarks, keterangan) VALUES 
                      ('$kd_stt','$no_awb', '$no_do', '$cart_id', '$id_pengirim', '$penerima', '$alamat', '$kota', '$kilo', '$koli', '$tgl_kirim', '$tgl_terima', '$nama', '$jenis_barang', '$remarks', '$keterangan')";
        
	  $hasil = mysqli_query($connect,$query);
		  // jika proses insert data sukses, maka counter $sukses bertambah  
	  // jika gagal, maka counter $gagal yang bertambah
	  if ($hasil) $sukses++;
	  else $gagal++ && $listGagal[]=$no_awb;
	}
   // tampilan status sukses dan gagal
echo "<h3>Proses Import Data Selesai.</h3>";
echo "<p>Jumlah Data Yang Sukses Diimport : ".$sukses."<br>";
echo "Jumlah Data Yang Gagal Diimport :".$gagal."</p>";
//echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di import</div>';
	// Tampilan data yang gagal terimport
if(is_array($listGagal) || is_object($listGagal)){
echo "<h5>List Data Yang Gagal Terimport. </h5>";
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal di import</div>';
foreach ($listGagal as $listgagal=>$value){
echo "<pre>";
echo "$listgagal. $value";
echo "</pre>"; 
}}
//          jika impor berhasil
        //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di import</div>';
    
//    hapus file xls yang udah dibaca
    unlink($_FILES['filereportpod']['name']);
}
 
?>
 
<form name="myForm" id="myForm" onSubmit="validateForm()" action="stt_importxls.php" method="post" enctype="multipart/form-data">
    <input type="file" id="filereportpod" class="form-control" name="filereportpod" required /><br />
    <input type="submit" name="submit" class="brn btn-sm btn-success" value="Import" /><br/>
    
</form>
 
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filereportpod', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
                        
              </div> 
              </div>
            </div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php include "footer.php"; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
