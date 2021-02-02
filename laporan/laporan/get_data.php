<?php
// Mengecek AJAX Request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    // panggil file config.php untuk koneksi ke database
    require_once "../config/config.php";
    // mengecek data get dari ajax
    if (isset($_GET['tgl_awal'])) {
        // variabel untuk nomor urut tabel
        $no = 1;
           // sql statement untuk menampilkan data dari tabel penjualan berdasarkan tanggal
        $query ="SELECT * FROM stt JOIN pengirim ON stt.id_pengirim = Pengirim.id_pengirim  WHERE  (stt.id_pengirim= ?) AND (tgl_kirim BETWEEN ? AND ?) ORDER BY kd_stt ASC";
		$query2 ="SELECT * FROM stt JOIN pengirim ON stt.id_pengirim = Pengirim.id_pengirim  WHERE  tgl_kirim BETWEEN ? AND ? ORDER BY kd_stt ASC";
		
		//$query2 = "SELECT id_pengirim FROM stt";
		// list($id_pengirim) = mysqli_fetch_array($query2);
        // membuat prepared statements
        $stmt = $mysqli->prepare($query);
        //cek query
        if (!$stmt) {
            die('Query Error: '.$mysqli->errno.'-'.$mysqli->error);
        }

        // ambil data get dari ajax
        $tgl_awal  = date('Y-m-d', strtotime($_GET['tgl_awal']));
        $tgl_akhir = date('Y-m-d', strtotime($_GET['tgl_akhir']));
	    $pengirim=$_GET['id_pengirim'];
		//$allreport=$_GET['all_report'];
        // hubungkan "data" dengan prepared statements
		$stmt->bind_param("sss",$pengirim,$tgl_awal, $tgl_akhir );
       // $stmt->bind_param("ss",$tgl_awal, $tgl_akhir );
		// jalankan query: execute
        $stmt->execute();
        // ambil hasil query
        $result = $stmt->get_result();
        // tampilkan hasil query
		
        while ($data = $result->fetch_assoc())
			{
            echo "<tr>
                    <td width='30' class='center'>".$no."</td>
					<td width='170'>".$data['no_awb']."</td>
					<td width='170'>".$data['no_do']."</td>
					<td width='170'>".$data['cart_id']."</td>
					<td width='170'>".$data['id_pengirim']."</td>
					<td width='170'>".$data['nama_pengirim']."</td>
					<td width='170'>".$data['penerima']."</td>
					<td width='270'>".$data['alamat_penerima']."</td>
					<td width='170'>".$data['kota']."</td>
					<td width='170'>".$data['kilo']."</td>
					<td width='170'>".$data['koli']."</td>
                    <td width='90' class='center'>".date('d-m-Y', strtotime($data['tgl_kirim']))."</td>
					<td width='90' class='center'>".date('d-m-Y', strtotime($data['tgl_terima']))."</td>
                    <td width='170'>".$data['nama_penerima']."</td>
					<td width='170'>".$data['jenis_barang']."</td>
					<td width='170'>".$data['status']."</td>
					<td width='170'>".$data['remarks']."</td>
					<td width='170'>".$data['keterangan']."</td>
					<td width='170'>".$data['scan_by']."</td>
					<td width='170'>".$data['tgl_scan']."</td>
                </tr>";
             $no++;
        };
        echo 
            
        // tutup statement
        $stmt->close();
    }
    // tutup koneksi
    $mysqli->close(); 
} else {
    // jika tidak ada ajax request, maka alihkan ke halaman index.php
    echo '<script>window.location="../index.php"</script>';
}
 ?>
 