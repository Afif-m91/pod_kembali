<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Absenpeserta */

$this->title = $model->KdAbsen;
$this->params['breadcrumbs'][] = ['label' => 'Absenpesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absenpeserta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->KdAbsen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->KdAbsen], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KdAbsen',
            'KdPeserta',
            'KdMapping',
            'TanggalAbsen',
            'JamAbsen',
        ],
    ]) ?>

</div>
