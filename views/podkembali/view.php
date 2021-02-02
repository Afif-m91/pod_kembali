<?php include 'config/koneksi.php'?>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Kode STT '.$model->kd_stt;
$this->params['breadcrumbs'][] = ['label' => 'Podkembali', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkembali-view">


    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_stt], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_stt], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin Akan Menghapus Data Ini?',
                'method' => 'post',
            ],
        ]) ?>
				<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
			'kd_stt',
			'no_awb',
            'no_do',
			'cart_id',
			'id_pengirim',
            'penerima',
            'alamat_penerima',
            'kota',
			'kilo',
			'koli',
			'tgl_kirim',
			'tgl_terima',
			'nama_penerima',
			'jenis_barang',
			'status',
			'remarks',
			'keterangan',
			'scan_by',
			'tgl_scan',
			'create_by',
			'create_time',
			'update_by',
			'update_time',
        ],
    ]) ?>
	
	  <?php $query=mysqli_query($connect,"select * from stt 
			  where kd_stt='".$_GET['id']."' ");
			  $data=mysqli_fetch_assoc($query)  
			  ?>
	<!-- <a href="/pod/cetak.php?id=<?php echo $data['kd_stt']; ?>" type="button" class="btn btn-primary" target="_BLANK" >
	 <span class="glyphicon glyphicon-print"></span> Print</a> -->

</div>
