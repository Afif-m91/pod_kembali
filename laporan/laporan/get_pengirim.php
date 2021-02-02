<?php
// Mengecek AJAX Request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
	// panggil file config.php untuk koneksi ke database
	require_once "config/config.php";
	// mengecek data get dari ajax
    if (isset($_GET['kd_pengirim'])) {
    	// sql statement untuk menampilkan data dari tabel pelanggan berdasarkan id_pelanggan
        $query = "SELECT nama_pengirim FROM pengirim WHERE kd_pengirim=?";
        // membuat prepared statements
        $stmt = $mysqli->prepare($query);
        //cek query
        if (!$stmt) {
            die('Query Error: '.$mysqli->errno.'-'.$mysqli->error);
        }

        // ambil data get dari ajax
    	$kd_pengirim = $_GET['kd_pengirim'];
    	// hubungkan "data" dengan prepared statements
        $stmt->bind_param("i", $kd_pengirim);
        // jalankan query: execute
        $stmt->execute();
        // ambil hasil query
        $result = $stmt->get_result();
        // tampilkan hasil query
        $data = $result->fetch_assoc();
        
        // tutup statement
        $stmt->close();
	}
	// tutup koneksi
	$mysqli->close(); 
	
	echo json_encode($data); 
} else {
    // jika tidak ada ajax request, maka alihkan ke halaman index.php
    echo '<script>window.location="../index.php"</script>';
}
?>