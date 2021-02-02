<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\gridView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedbacktraining */

$this->title = 'Kode Feedback '.$model->KdFeedbackTraining;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacktrainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbacktraining-view">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Update', ['update', 'id' => $model->KdFeedbackTraining], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->KdFeedbackTraining], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin Akan Menghapus Data Feedback Training Ini?',
                'method' => 'post',
            ],
        ]) ?>
		<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KdFeedbackTraining',
            'KdMapping',
            //'KdPeserta
			 [
        	'label' => 'Nama Peserta',
        	'value' => $model->peserta->NamaPeserta
        	
        ],
            'TanggalIsi',
            'Jam',
        ],
    ]) ?>

	<fieldset class="group-border">
        <legend class="group-border">Hasil Feedback Form Training</legend>
<?=		
		Gridview::widget(['dataProvider'=>$dataProvider,
'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Keterangan',
            'DeskripsiFeedback',
             'FeedbackPoint',
        ],
		])
?>

		
	</fieldset>
</div>
