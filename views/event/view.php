<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Berita */

$this->title = 'Kode Events '.$model->kd_event;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">
<?php if (!$model->isNewRecord){
	if ($model['gambar']!=''){
		echo '<img src="../FileEvent/'.$model['gambar'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileEvent/default.png" width="140px" height="140px">';
	}
   } ?> <br/>
    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_event], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_event], [
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
            'kd_event',
            'judul_event',
            //'kd_kategori',
		       'gambar',
            'isi_event:ntext',
            //'kd_wilayah',
			 'tgl_update',
            //'kd_user',
        ],
    ]) ?>

</div>
