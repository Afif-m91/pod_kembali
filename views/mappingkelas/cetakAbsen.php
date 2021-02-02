<style type="text/css">
@media print
{
	input.noPrint{display:none;
}
</style>
<?php
$this->title = 'Absensi Peserta '.$_GET['id'];
$this->params['breadcrumbs'][] = ['label' => 'Mappingkelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

 foreach ($mapping as $value) { ?> 
        <legend class="group-border">Materi Training <?= $value['NamaMateri'] ?></legend>
Nama Perusahaan : <?= $value['Perusahaan'] ?><br>
Tanggal : <?= $value['TanggalMulai'] ?> s/d <?= $value['TanggalSelesai'] ?><br>
Nama Trainer : <?= $value['NamaPegawai'] ?><p>
<?php } ?>

<table width="70%" border="1px" class="table table-bordered" >
<tr><th> Nama Peserta </th><th> Tanggal </th> <th> Paraf </th> </tr>
<?php foreach ($mappingData as $value2) { ?> 
<tr><td> <?= $value2['NamaPeserta'] ?> </td><td>  </td> <td>  </td> </tr>
<?php } ?>
</table>

<input action="action" type="button" value="Cetak" class="btn btn-success noPrint" onclick="window.print()"></" />