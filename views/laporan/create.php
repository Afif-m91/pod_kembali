<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Provinsi */

$this->title = 'Export Data STT';
$this->params['breadcrumbs'][] = ['label' => 'Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
