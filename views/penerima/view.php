<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penerima */

$this->title ='Kode Penerima '.$model->kd_penerima;
$this->params['breadcrumbs'][] = ['label' => 'Penerima', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerima-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kd_penerima], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['delete', 'id' => $model->kd_penerima], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin Akan Melakukan Cancel dan Menghapus Data Ini?',
                'method' => 'post',
            ],
        ]) ?>
		<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kd_penerima',
            'nama_penerima',
            'alamat_penerima',
            'no_hp',
			'tgl_penerima',
            
        ],
    ]) ?>

</div>
