<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Loginuser */

$this->title = 'Ubah Data Pengguna: ' . ' ' . $model->kd_user;
$this->params['breadcrumbs'][] = ['label' => 'Loginusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_user, 'url' => ['view', 'id' => $model->kd_user]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="loginuser-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
