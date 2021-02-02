<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pod_kembali_spl";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'kd_stt',
	1 => 'no_awb',
    2 => 'no_do', 
	3 => 'cart_id',
	4 => 'id_pengirim',
    5 => 'penerima',
    6 => 'alamat_penerima',
    7 => 'kota',
    8 => 'kilo',
    9 => 'koli',
    10 => 'tgl_kirim',
    11 => 'tgl_terima',
    12 => 'nama_penerima',
    13 => 'jenis_barang',
    14 => 'remarks',
    15 => 'keterangan',
);

// getting total number records without any search
$sql = "SELECT kd_stt,no_awb, no_do, cart_id, id_pengirim, penerima, alamat_penerima, kota, kilo, koli, tgl_kirim, tgl_terima, nama_penerima, jenis_barang, remarks, keterangan";
$sql.=" FROM stt";
$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Stt");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kd_stt,no_awb, no_do, cart_id, id_pengirim, penerima, alamat_penerima, kota, kilo, koli, tgl_kirim, tgl_terima, nama_penerima, jenis_barang, remarks, keterangan";
	$sql.=" FROM stt";
	$sql.=" WHERE kd_stt LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR no_awb LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR no_do LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR cart_id LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR id_pengirim LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR penerima LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR alamat_penerima LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kota LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kilo LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR koli LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tgl_kirim LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tgl_terima LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nama_penerima LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jenis_barang LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR remarks LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR keterangan LIKE '".$requestData['search']['value']."%' ";
   	$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Stt");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Stt"); // again run query with limit
	
} else {	

	$sql = "SELECT kd_stt,no_awb, no_do, cart_id, id_pengirim, penerima, alamat_penerima, kota, kilo, koli, tgl_kirim, tgl_terima, nama_penerima, jenis_barang, remarks, keterangan";
	$sql.=" FROM stt";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Stt");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kd_stt"];
	$nestedData[] = $row["no_awb"];
    $nestedData[] = $row["no_do"];
	$nestedData[] = $row["cart_id"];
	$nestedData[] = $row["id_pengirim"];
	$nestedData[] = $row["penerima"];
    $nestedData[] = $row["alamat_penerima"];
	$nestedData[] = $row["kota"];
    $nestedData[] = $row["koli"];
    $nestedData[] = $row["kilo"];
    $nestedData[] = $row["tgl_kirim"];
    $nestedData[] = $row["tgl_terima"];
    $nestedData[] = $row["nama_penerima"];
    $nestedData[] = $row["jenis_barang"];
    $nestedData[] = $row["remarks"];
    $nestedData[] = $row["keterangan"];
    /** $nestedData[] = '<td><center>
                     <a href="edit-siswa.php?kd='.$row['kode_siswa'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="hapus-siswa.php?kd='.$row['kode_siswa'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_siswa'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
	                 </center></td>';		**/
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
