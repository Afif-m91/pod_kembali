<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jabatan */

$this->title = 'Ubah Data Jabatan: '. $model->kd_jabatan;
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_jabatan, 'url' => ['view', 'id' => $model->kd_jabatan]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="jabatan-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
