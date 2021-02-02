<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Feedbacktraining */

$this->title = 'Isi Feedback Form Training';
$this->params['breadcrumbs'][] = ['label' => 'Feedbacktrainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbacktraining-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelDetail'=>$modelDetail,
		'modelForm'=>$modelForm,
    ]) ?>

</div>
