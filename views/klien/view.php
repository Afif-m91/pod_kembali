<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Klien */

$this->title = 'Kode Client '.$model->kd_klien;
$this->params['breadcrumbs'][] = ['label' => 'Kliens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klien-view">
<?php if (!$model->isNewRecord){
	if ($model['gambar']!=''){
		echo '<img src="../FileClient/'.$model['gambar'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileClient/default.png" width="140px" height="140px">';
	}
   } ?> <br/>
    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_klien], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_klien], [
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
            'kd_klien',
            'nama_klien',
			'alamat_klien',
			'no_hp',
            //'kd_kategori',
		       'gambar',
            //'kd_wilayah',
			 'tgl_update',
            //'kd_user',
        ],
    ]) ?>

</div>
