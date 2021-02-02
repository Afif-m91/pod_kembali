<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Loginuser */

$this->title = 'Kode User '.$model->kd_user;
$this->params['breadcrumbs'][] = ['label' => 'Loginusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loginuser-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_user], [
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
            'kd_user',
            //'KdPegawai',
			 [
        	'label' => 'Nama Pegawai',
        	'value' => $model->pegawai->nama_pegawai
        	
        ],
            //'KdAksesLevel',
			 [
        	'label' => 'Akses Level',
        	'value' => $model->akseslevel->nama_akses_level
        	
        ],
            'password',
            'status_user',
        ],
    ]) ?>

</div>
