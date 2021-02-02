<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ruangan */

$this->title = 'Update Ruangan: ' . ' ' . $model->KdRuangan;
$this->params['breadcrumbs'][] = ['label' => 'Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KdRuangan, 'url' => ['view', 'id' => $model->KdRuangan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ruangan-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
