<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feedbackform */

$this->title = 'Ubah Data Feedback : ' . ' ' . $model->KdFeedback;
$this->params['breadcrumbs'][] = ['label' => 'Feedbackform', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KdFeedback, 'url' => ['view', 'id' => $model->KdFeedback]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feedbackform-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
