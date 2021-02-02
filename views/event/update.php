<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Events */

$this->title = 'Ubah Events: ' . ' ' . $model->kd_event;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_event, 'url' => ['view', 'id' => $model->kd_event]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berita-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
