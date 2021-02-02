<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengirm */

$this->title = 'Kode Pengiriman '.$model->kd_pengirim;
$this->params['breadcrumbs'][] = ['label' => 'Pengirims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengirim-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_pengirim], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_pengirim], [
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
            'kd_pengirim',
			'id_pengirim',
            'nama_pengirim',
            //'kd_kategori',
		      'alamat_pengirim',
			  'no_hp',
            //'',
			 'tgl_pengiriman',
            //'',
        ],
    ]) ?>

</div>
