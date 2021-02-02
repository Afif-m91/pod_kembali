<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Absenpeserta */

$this->title = 'Update Absenpeserta: ' . ' ' . $model->KdAbsen;
$this->params['breadcrumbs'][] = ['label' => 'Absenpesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KdAbsen, 'url' => ['view', 'id' => $model->KdAbsen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absenpeserta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
