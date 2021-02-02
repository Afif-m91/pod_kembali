<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jabatan */

$this->title = 'Kode Jabatan '.$model->kd_jabatan;
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_jabatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_jabatan], [
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
            'kd_jabatan',
            'nama_jabatan',
        ],
    ]) ?>

</div>
