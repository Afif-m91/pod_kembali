<?php session_start();
$nama=$_SESSION['nama'];
	include "config/config.php";?>


<!DOCTYPE html>
<link rel="shortcut icon" href="../web/pav.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
        <!-- datepicker CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css">
        <!-- Sweetalert CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/css/sweetalert.css">
        <!-- Chosen CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap-4/css/chosen.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- jQuery -->
        <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>

<html lang="en">
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
              	  <h5 class="centered">
                  Export Data Excel
              </h5>
   	  	
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
          	<h3><i class="fa fa-angle-right"></i> EXPORT DATA </h3>
              <!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data STT </h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                    
                 <div class="content-header row mb-3">
    <div class="col-md-12">
		<h5>
			<!-- judul halaman laporan penjualan -->
			<i class="fas fa-file-alt title-icon"></i> Laporan STT
		</h5>
	</div>
</div>

<div class="border mb-4"></div>

<div class="row">
    <div class="col-md-12">
        <!-- form filter data penjualan -->
        <form id="formFilter" action="laporan/export.php" method="get">

        	<div class="row">
				<div class="col">
					<div class="form-group mb-0">
						<label>Filter : </label>
					</div>
				</div>
			</div>

        	<div class="row">
				<div class="col-md-2">
		            <div class="form-group">
		                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off" required>
		            </div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
		              <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off" required>
		            </div>
				</div>
				
		<div class="col-md-4">
			<div class="form-group">
	       	 <select id="id_pengirim" name="id_pengirim" class="chosen-select" autocomplete="off" required>
				  <option value="0">-- Pilih Pengirim --</option>
							<?php
                            // panggil file config.php untuk koneksi ke database
                            require_once "/config/config.php";
                            // sql statement untuk menampilkan data no_hp dari tabel pelanggan
                            $query = "SELECT id_pengirim, nama_pengirim FROM pengirim ORDER BY kd_pengirim ASC";
                            // membuat prepared statements
                            $stmt = $mysqli->prepare($query);
                            //cek query
                            if (!$stmt) {
                                die('Query Error: '.$mysqli->errno.'-'.$mysqli->error);
                            }
                            // jalankan query: execute
                            $stmt->execute();
                            // ambil hasil query
                            $result = $stmt->get_result();
                            // tampilkan data
                            while ($data_pengirim = $result->fetch_assoc()) {
                              echo"<option value='$data_pengirim[id_pengirim]'> $data_pengirim[nama_pengirim] ( $data_pengirim[id_pengirim] )</option>";
                            }
                            // tutup statement
                            $stmt->close();
                            ?>
                </select>	
			</div>
		</div>
				<div class="col">
					<div class="form-group">
		                <button type="button" class="btn btn-info btn-submit" id="btnTampil">Tampilkan</button>
			  		</div>
				</div>

				<div class="col">
					<div class="form-group right">
		                <!-- tombol export data ke excel -->
				    	<button type="submit" class="btn btn-success mb-3" id="btnExport">
				    		<i class="fas fa-file-excel title-icon"></i> Export ke Excel
				    	</button>
			  		</div>
				</div>
			</div>
        </form>
    </div>
</div>
 <script src="jquery-1.11.2.min.js"></script>
        <script src="select2.min.js"></script>
        
<div class="border mt-2 mb-4"></div>

<div class="row">
     <div id="tabelLaporan" class="col-md-12">
		<!-- Tabel untuk menampilkan laporan data penjualan dari database -->
          <table id="tabel-penjualan" class="table table-striped table-bordered" style="width:100%">
			<!-- judul kolom pada bagian kepala (atas) tabel -->
            <thead>
                <tr>
                    <th class="center">No.</th>
					<th class="center">No. AWB</th>
					<th class="center">No. DO</th>
					<th class="center">Cartoon ID</th>
					<th class="center">ID Pengirim</th>
					<th class="center">Nama Pengirim</th>
					<th class="center">Penerima</th>
					<th class="center">Alamat Penerima</th>
					<th class="center">Kota</th>
					<th class="center">Kilo</th>
					<th class="center">Koli</th>
                    <th class="center">Tanggal Kirim</th>
					<th class="center">Tanggal Terima</th>
					<th class="center">Nama Penerima</th>
					<th class="center">Jenis Barang</th>
					<th class="center">Status</th>
					<th class="center">Remarks</th>
					<th class="center">Service</th>
					<th class="center">Nama PIC</th>
					<th class="center">Date & Time Scan</th>
                </tr>
            </thead>
			
			
			
            <!-- parameter untuk memuat isi tabel -->
            <tbody id="loadData"></tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
function get_pengirim(){
    // membuat variabel untuk menampung id_pelanggan
    var kd_pengirim = $('#kd_pengirim').val(); 

    $.ajax({
        type     : "GET",                                   // mengirim data dengan method GET 
        url      : "laporan/get_pengirim.php",   // proses get data pelanggan berdasarkan id_penjualan
        data     : {kd_pengirim:kd_pengirim},             // data yang dikirim
        dataType : "JSON",                                  // tipe data JSON
        success: function(result){                          // ketika sukses get data
            // tampilkan data
            $("#nama_pengirim").val(result.nama_pengirim);
        }
    }); 
}
$(document).ready(function(){
    // datepicker plugin
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
		
    });
   $('.chosen-select').chosen();
     
	 
	// menyembunyikan tabel laporan
    $('#tabelLaporan').hide();
    // menyembunyikan tombol export
    $('#btnExport').hide();
					
    // Tampilkan tabel laporan data penjualan
    $('#btnTampil').click(function(){
        // Validasi form input
	 $('#kd_pengirim').val('').trigger('chosen:updated');
        // jika tanggal awal kosong
        if ($('#tgl_awal').val()==""){
            // focus ke input tanggal awal
            $( "#tgl_awal" ).focus();
		    // tampilkan peringatan data tidak boleh kosong
            swal("Peringatan!", "Tanggal awal tidak boleh kosong.", "warning");
        }
		
        // jika tanggal akhir kosong
        else if 
		($('#tgl_akhir').val()==""){
            // focus ke input tanggal akhir
            $( "#tgl_akhir" ).focus();
			// tampilkan peringatan data tidak boleh kosong
            swal("Peringatan!", "Tanggal akhir tidak boleh kosong.", "warning");
		}
		
			else {
        	// membuat variabel untuk menampung data dari form filter
        	var data = $('#formFilter').serialize();

        	$.ajax({
				type : "GET",                           	// mengirim data dengan method GET 
				url  : "laporan/get_data.php",	 // proses get data penjualan berdasarkan tanggal
				data : data,                 				// data yang dikirim
	            success: function(data){                  	// ketika sukses get data
			        // menampilkan tabel laporan
			        $('#tabelLaporan').show();
			        // menampilkan data penjualan
			        $('#loadData').html(data);
				    // menampilkan tombol export
				    $('#btnExport').show();
	            }
	        });
        }
    });
	
	
	// saat tombol export diklik
    $('#btnExport').click(function(){
    	// tampilkan pesan sukses export data
        swal("Sukses!", "Laporan Data STT berhasil diexport.", "success");
    });
});
</script>
                   </div>
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
    <script src="datatables/jQuery-2.1.4.min.js"></script>
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
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap.min.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
       <script type="text/javascript" src="assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <!-- Fontawesome Plugin JS -->
        <script type="text/javascript" src="assets/plugins/fontawesome-free-5.5.0-web/js/all.min.js"></script>
        <!-- DataTables Plugin JS -->
        <script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
        <!-- datepicker Plugin JS -->
        <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- SweetAlert Plugin JS -->
        <script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script>
        <!-- Chosen Plugin JS -->
        <script type="text/javascript" src="assets/plugins/chosen-bootstrap-4/js/chosen.jquery.js"></script>
    
  <!-- <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>-->
  <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>

  </body>
</html>
