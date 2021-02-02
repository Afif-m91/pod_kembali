<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Ubah Data STT: ' . ' ' . $model->kd_stt;
$this->params['breadcrumbs'][] = ['label' => 'Podkembali', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_stt, 'url' => ['view', 'id' => $model->kd_stt]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="podkembali-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
