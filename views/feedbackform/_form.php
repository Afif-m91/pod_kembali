<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Feedbackform */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="feedbackform-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'KdFeedback')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DeskripsiFeedback')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'Keterangan')->textArea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</section>
