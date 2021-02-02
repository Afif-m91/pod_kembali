<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pesertatraining */

$this->title = 'Tambah Peserta Training';
$this->params['breadcrumbs'][] = ['label' => 'Pesertatraining', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pesertatraining-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
