<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Statuspegawai */

$this->title = 'Ubah Status Pegawai: '.$model->kd_status;
$this->params['breadcrumbs'][] = ['label' => 'Status Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_status, 'url' => ['view', 'id' => $model->kd_status]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="statuspegawai-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
