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
	0 => 'no_awb',
    1 => 'no_do', 
	2 => 'cart_id',
	3 => 'kd_pengirim',
    4 => 'penerima',
    5 => 'alamat_penerima',
    6 => 'kota',
    7 => 'kilo',
    8 => 'koli',
    9 => 'tgl_kirim',
    10 => 'tgl_terima',
    11 => 'nama_penerima',
    12 => 'jenis_barang',
    13 => 'remarks',
);

// getting total number records without any search
$sql = "SELECT no_awb, no_do, cart_id, kd_pengirim, penerima, alamat_penerima, kota, kilo, koli, tgl_kirim, tgl_terima, nama_penerima, jenis_barang, remarks, keterangan";
$sql.=" FROM stt";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get Barang");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id, semester, kode_pelajaran, kode_guru, kode_kelas, kode_siswa, nilai_tugas1, nilai_tugas2, nilai_tugas3, nilai_tugas4, nilai_tugas5, nilai_tugas6, nilai_tugas7, nilai_tugas8, nilai_tugas9, nilai_tugas10, nilai_tugas11, nilai_tugas12, nilai_tugas13, nilai_uts, nilai_uas, keterangan";
	$sql.=" FROM nilai";
    $sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR semester LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR kode_pelajaran LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kode_guru LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kode_kelas LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kode_siswa LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas1 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas2 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas3 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas4 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas5 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas6 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas7 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas8 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas9 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas10 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas11 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas12 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_tugas13 LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_uts LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nilai_uas LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR keterangan LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get Barang");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get Barang"); // again run query with limit
	
} else {	

	$sql = "SELECT id, semester, kode_pelajaran, kode_guru, kode_kelas, kode_siswa, nilai_tugas1, nilai_tugas2, nilai_tugas3, nilai_tugas4, nilai_tugas5, nilai_tugas6, nilai_tugas7, nilai_tugas8, nilai_tugas9, nilai_tugas10, nilai_tugas11, nilai_tugas12, nilai_tugas13, nilai_uts, nilai_uas, keterangani";
	$sql.=" FROM nilai";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get Barang");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 


    $nestedData[] = $row["id"];
    $nestedData[] = $row["semester"];
	$nestedData[] = $row["kode_pelajaran"];
	$nestedData[] = $row["kode_guru"];
    $nestedData[] = $row["kode_kelas"];
    $nestedData[] = $row["kode_siswa"];
    $nestedData[] = $row["nilai_tugas1"];
    $nestedData[] = $row["nilai_tugas2"];
    $nestedData[] = $row["nilai_tugas3"];
    $nestedData[] = $row["nilai_tugas4"];
    $nestedData[] = $row["nilai_tugas5"];
    $nestedData[] = $row["nilai_tugas6"];
    $nestedData[] = $row["nilai_tugas7"];
    $nestedData[] = $row["nilai_tugas8"];
    $nestedData[] = $row["nilai_tugas9"];
    $nestedData[] = $row["nilai_tugas10"];
    $nestedData[] = $row["nilai_tugas11"];
    $nestedData[] = $row["nilai_tugas12"];
    $nestedData[] = $row["nilai_tugas13"];
    $nestedData[] = $row["nilai_uts"];
    $nestedData[] = $row["nilai_uas"];
    $nestedData[] = $row["keterangan"];		
	
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
