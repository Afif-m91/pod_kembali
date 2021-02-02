<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userrole */

$this->title = 'Ubah Akses Level: ' . ' ' . $model->KdAksesLevel;
$this->params['breadcrumbs'][] = ['label' => 'Akses Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KdAksesLevel, 'url' => ['view', 'id' => $model->KdAksesLevel]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="userrole-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
