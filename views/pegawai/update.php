<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Ubah Data Pegawai: ' . ' ' . $model->kd_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_pegawai, 'url' => ['view', 'id' => $model->kd_pegawai]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="pegawai-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
