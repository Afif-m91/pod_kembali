<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Report_STT.xls");
 
// Tambahkan table

?>
<table border="1">
		<tr>
			<th>No</th>
			<th>Kode STT</th>
			<th>No AWB</th>
			<th>No DO</th>
			<th>Carton ID</th>
			<th>Penerima</th>
			<th>Alamat Penerima</th>
			<th>Kota</th>
			<th>Kilo</th>
			<th>Koli</th>
			<th>Tanggal Kirim</th>
			<th>Tanggal Terima</th>
			<th>Nama Penerima</th>
			<th>Jenis Barang</th>
			<th>Status</th>
			<th>Remarks</th>
			<th>Keterangan</th>
		</tr>
<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","pod_kembali_spl");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from stt order by kd_stt desc");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['kd_stt']; ?></td>
			<td><?php echo $d['no_awb']; ?></td>
			<td><?php echo $d['no_do']; ?></td>
			<td><?php echo $d['cart_id']; ?></td>
			<td><?php echo $d['penerima']; ?></td>
			<td><?php echo $d['alamat_penerima']; ?></td>
			<td><?php echo $d['kota']; ?></td>
			<td><?php echo $d['kilo']; ?></td>
			<td><?php echo $d['koli']; ?></td>
			<td><?php echo $d['tgl_kirim']; ?></td>
			<td><?php echo $d['tgl_terima']; ?></td>
			<td><?php echo $d['nama_penerima']; ?></td>
			<td><?php echo $d['jenis_barang']; ?></td>
			<td><?php echo $d['status']; ?></td>
			<td><?php echo $d['remarks']; ?></td>
			<td><?php echo $d['keterangan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>