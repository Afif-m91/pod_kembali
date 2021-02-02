<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FeedbackformSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedbackform-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class="col-md-5">
         <div class="form-group" style="margin-left:-13px;">
            <?php $model->cari=$_GET['FeedbackformSearch']['cari'];?>
            <?= $form->field($model, 'cari')->input('cari', ['placeholder' => "Pencarian"])->label(false) ?>
         </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?php
        ?>
        <?= Html::a('Refresh', ['/feedbackform/'], ['class'=>'btn btn-default']) ?>
    </div> 

    <?php ActiveForm::end(); ?>
</div>