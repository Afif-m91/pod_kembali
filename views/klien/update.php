<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Klien */

$this->title = 'Ubah Client: ' . ' ' . $model->kd_klien;
$this->params['breadcrumbs'][] = ['label' => 'Kliens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_klien, 'url' => ['view', 'id' => $model->kd_klien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="klien-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
