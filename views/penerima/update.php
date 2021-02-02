<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penerima */

$this->title = 'Update Penerima : ' . ' ' . $model->kd_penerima;
$this->params['breadcrumbs'][] = ['label' => 'Penerima POD Kembali SPL', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_penerima, 'url' => ['view', 'id' => $model->kd_penerima]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
