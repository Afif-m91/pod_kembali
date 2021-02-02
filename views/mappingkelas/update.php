<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Mappingkelas */

$this->title = 'Kode Mapping Kelas '.$model->KdMapping;
$this->params['breadcrumbs'][] = ['label' => 'Mappingkelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
#modal-dialog{
	width:800px;
	
}
</style>
<?php 
$this->registerJs(
  "$('.modalButton').on('click', function () {
    $('#modal').modal('show')
	.find('#modalContent')
	.load($(this).attr('value'));
  });
  "
  );
?>  
<div class="mappingkelas-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
      <?//= Html::a('Ubah Mapping Kelas', ['update', 'id' => $model->KdMapping], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel Mapping Kelas', ['delete', 'id' => $model->KdMapping], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin Akan Melakukan Cancel dan Menghapus Data Ini?',
                'method' => 'post',
            ],
        ]) ?>
		<a class="btn btn-success modalButton" value="<?=Url::to(['mappingkelas/data-peserta?id='.$model->KdMapping]) ?>"> Lihat Peserta </a>
		<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </p>
<fieldset class="group-border">
<?php foreach ($Request as $value) { ?> 
        <legend class="group-border">Sales Request By <?= $value['NamaPegawai'] ?></legend>
Nama Perusahaan : <?= $value['Perusahaan'] ?><br>
Tanggal Request : <?= $value['TanggalRequest'] ?><p>
<?php } ?>
		
</fieldset>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KdMapping',
            //'KdPegawai',
				 [
        	'label' => 'Nama Trainer',
        	'value' => $model->pegawai->NamaPegawai
        	
        ],
            //'KdRuangan',
				 [
        	'label' => 'Ruang Training',
        	'value' => $model->ruangan->NamaRuangan
        	
        ],
            //'KdMateri',
				 [
        	'label' => 'Materi Training',
        	'value' => $model->materi->NamaMateri
        	
        ],
            'TanggalMulai',
            'TanggalSelesai',
            'Keterangan:ntext',
        ],
    ]) ?>

</div>
<?php
Modal::begin([
    'id' => 'modal',
    'header' => 'List Peserta Training',
	'size'=>'modal-md',
]);
echo"<div id='modalContent'></div>";
Modal::end();
?> 