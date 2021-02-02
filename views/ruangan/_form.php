<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ruangan */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="ruangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'KdRuangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NamaRuangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gedung')->textInput(['maxlength' => true]) ?>
<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-3">
    <?= $form->field($model, 'Lantai')->textInput(['type'=>'number']) ?>
</div>
<div class="col-md-3">
    <?= $form->field($model, 'Kapasitas')->textInput(['type'=>'number']) ?>
</div>
<div class="col-md-3" style="margin-top:3%;font-size:18px;">
 Orang
</div>
</div>

    <?= $form->field($model, 'Alamat')->textarea(['rows' => 4]) ?>
 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
<section>