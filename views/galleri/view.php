<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Berita */

$this->title = 'Kode Gallery '.$model->kd_galeri;
$this->params['breadcrumbs'][] = ['label' => 'Galleris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleri-view">
<?php if (!$model->isNewRecord){
	if ($model['gambar1']!=''){
		echo '<img src="../FileGallery/'.$model['gambar1'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileGallery/default.png" width="140px" height="140px">';
	}
	if ($model['gambar2']!=''){
		echo '<img src="../FileGallery/'.$model['gambar2'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileGallery/default.png" width="140px" height="140px">';
	}
	if ($model['gambar3']!=''){
		echo '<img src="../FileGallery/'.$model['gambar3'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileGallery/default.png" width="140px" height="140px">';
	}
	if ($model['gambar4']!=''){
		echo '<img src="../FileGallery/'.$model['gambar4'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileGallery/default.png" width="140px" height="140px">';
	}
	if ($model['gambar5']!=''){
		echo '<img src="../FileGallery/'.$model['gambar5'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileGallery/default.png" width="140px" height="140px">';
	}
   } ?> <br/>
    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_galeri], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_galeri], [
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
            'kd_galeri',
			//'kd_unique',
            'nama_folder',
            //'kd_kategori',
		       'gambar1',
			   'gambar2',
			   'gambar3',
			   'gambar4',
			   'gambar5',
				'tgl_update',
            //'kd_user',
        ],
    ]) ?>

</div>
