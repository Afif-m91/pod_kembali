<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userrole */

$this->title = 'Kode Akses Level '.$model->KdAksesLevel;
$this->params['breadcrumbs'][] = ['label' => 'Akses Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userrole-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->KdAksesLevel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->KdAksesLevel], [
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
            'KdAksesLevel',
            'NamaAksesLevel',
        ],
    ]) ?>

</div>
