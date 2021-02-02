<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\event */

$this->title = 'Tambah Event Baru';
$this->params['breadcrumbs'][] = ['label' => 'envents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
