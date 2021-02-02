<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\pengirim */

$this->title = 'Tambah Pengiriman Baru';
$this->params['breadcrumbs'][] = ['label' => 'Pengirims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengirim-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
