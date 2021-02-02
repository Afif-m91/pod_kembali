<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengirim */

$this->title = 'Ubah Pengirim: ' . ' ' . $model->kd_pengirim;
$this->params['breadcrumbs'][] = ['label' => 'Pengirims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_pengirim, 'url' => ['view', 'id' => $model->kd_pengirim]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengirim-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
