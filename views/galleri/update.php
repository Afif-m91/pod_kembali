<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Ubah Gallery: ' . ' ' . $model->kd_galeri;
$this->params['breadcrumbs'][] = ['label' => 'Galleris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_galeri, 'url' => ['view', 'id' => $model->kd_galeri]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berita-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
