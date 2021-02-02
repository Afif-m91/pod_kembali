<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pesertatraining */

$this->title = 'Ubah Peserta Training : ' . ' ' . $model->KdPeserta;
$this->params['breadcrumbs'][] = ['label' => 'Pesertatraining', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KdPeserta, 'url' => ['view', 'id' => $model->KdPeserta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pesertatraining-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
