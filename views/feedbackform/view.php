<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedbackform */

$this->title = 'Kode Feedback '.$model->KdFeedback;
$this->params['breadcrumbs'][] = ['label' => 'Feedbackform', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbackform-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->KdFeedback], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('hapus', ['delete', 'id' => $model->KdFeedback], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin Akan Menghapus Data Ini?',
                'method' => 'post',
            ],
        ]) ?>
		<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KdFeedback',
            'DeskripsiFeedback:ntext',
            'Keterangan',
        ],
    ]) ?>

</div>
