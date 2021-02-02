<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pesertatraining */

$this->title = 'Kode Peserta '.$model->KdPeserta;
$this->params['breadcrumbs'][] = ['label' => 'Pesertatrainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesertatraining-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->KdPeserta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->KdPeserta], [
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
            'KdPeserta',
            'NamaPeserta',
            'JenisKelamin',
            'PekerjaanPeserta',
            'TempatLahir',
            'TanggalLahir',
            'AlamatPeserta',
            'KontakPeserta',
            'EmailPeserta:email',
            'NoIdentitas',
            'NamaPerusahaan',
            'AlamatPerusahaan',
            //'TrainingDate',
            //'TrainingEndDate',
        ],
    ]) ?>

</div>
