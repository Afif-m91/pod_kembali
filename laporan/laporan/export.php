<?php
// panggil file config.php untuk koneksi ke database
require_once "../config/config.php";
// mengecek data get dari ajax
if (isset($_GET['tgl_awal'])) {
    header("Content-Type: application/force-download");
    header("Cache-Control: no-cache, must-revalidate");
    // nama file hasil export
    header("content-disposition: attachment;filename=Laporan Data STT ".$_GET['tgl_awal']." sd ".$_GET['tgl_akhir'].".xls");
?>
    <!-- Judul laporan -->
    
    <!-- Table untuk di Export Ke Excel -->
    <table border='1'>
        <h3>
            <thead>
                <tr>
                    <th class="center" bgcolor="#ccc7c7">No.</th>
					<th class="center" bgcolor="#ccc7c7">Kode STT</th>
					<th class="center" bgcolor="#ccc7c7">No. AWB</th>
					<th class="center" bgcolor="#ccc7c7">No. DO</th>
					<th class="center" bgcolor="#ccc7c7">Cartoon ID</th>
					<th class="center" bgcolor="#ccc7c7">ID Pengirim</th>
					<th class="center" bgcolor="#ccc7c7">Nama Pengirim</th>
					<th class="center" bgcolor="#ccc7c7">Penerima</th>
					<th class="center" bgcolor="#ccc7c7">Alamat Penerima</th>
					<th class="center" bgcolor="#ccc7c7">Kota</th>
					<th class="center" bgcolor="#ccc7c7">Kilo</th>
					<th class="center" bgcolor="#ccc7c7">Koli</th>
                    <th class="center" bgcolor="#ccc7c7">Tanggal Kirim</th>
                    <th class="center" bgcolor="#ccc7c7">Tanggal Terima</th>
					<th class="center" bgcolor="#ccc7c7">Nama Penerima</th>
					<th class="center" bgcolor="#ccc7c7">Jenis Barang</th>
					<th class="center" bgcolor="#ccc7c7">Status</th>
					<th class="center" bgcolor="#ccc7c7">Remarks</th>
					<th class="center" bgcolor="#ccc7c7">Service</th>
					<th class="center" bgcolor="#ccc7c7">Nama PIC</th>
					<th class="center" bgcolor="#ccc7c7">Date & Time Scan</th>
                </tr>
            </thead>
        </h3>

        <tbody>
        <?php  
        // variabel untuk nomor urut tabel
        $no = 1;
        // variabel untuk total bayar
        $total = 0;
        // sql statement untuk menampilkan data dari tabel penjualan berdasarkan tanggal
        $query ="SELECT * FROM stt JOIN pengirim ON stt.id_pengirim = Pengirim.id_pengirim  WHERE  (stt.id_pengirim= ?) AND (tgl_kirim BETWEEN ? AND ?) ORDER BY kd_stt ASC";
		
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
        // hubungkan "data" dengan prepared statements
        $stmt->bind_param("sss",$pengirim,$tgl_awal, $tgl_akhir );
        // jalankan query: execute
        $stmt->execute();
        // ambil hasil query
        $result = $stmt->get_result();
        // tampilkan hasil query
        while ($data = $result->fetch_assoc()) {
            echo "<tr>
                    <td width='30' class='left'>".$no."</td>
					<td width='100' class='left'>".$data['kd_stt']."</td>
					<td width='170' class='left'>".$data['no_awb']."</td>
					<td width='170' class='left'>".$data['no_do']."</td>
					<td width='100' class='left'>".$data['cart_id']."</td>
					<td width='100' class='left'>".$data['id_pengirim']."</td>
					<td width='300' class='left'>".$data['nama_pengirim']."</td>
					<td width='350' class='left'>".$data['penerima']."</td>
					<td width='800' class='left'>".$data['alamat_penerima']."</td>
					<td width='100' class='left'>".$data['kota']."</td>
					<td width='50' class='left'>".$data['kilo']."</td>
					<td width='50' class='left'>".$data['koli']."</td>
                    <td width='90' class='left'>".date('d-m-Y', strtotime($data['tgl_kirim']))."</td>
                    <td width='90' class='left'>".date('d-m-Y', strtotime($data['tgl_terima']))."</td>
                    <td width='170' class='left'>".$data['nama_penerima']."</td>
					<td width='170' class='left'>".$data['jenis_barang']."</td>
					<td width='100' class='left'>".$data['status']."</td>
					<td width='170' class='left'>".$data['remarks']."</td>
					<td width='170' class='left'>".$data['keterangan']."</td>
					<td width='170' class='left'>".$data['scan_by']."</td>
					<td width='170' class='left'>".$data['tgl_scan']."</td>
                </tr>";
            $no++;
        };
        // tutup statement
        $stmt->close();
        ?>
        </tbody>
    </table>
<?php 
}
// tutup koneksi
$mysqli->close(); 
?>