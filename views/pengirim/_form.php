<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\pengirim */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="pengirim-form">
 <?php 
 $form = ActiveForm::begin([
                'id' => 'pengirim-form',

                'options'=>['enctype'=>'multipart/form-data'] ,
           
    ]);
	?>
	
    <?//= $form->field($model, 'kd_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pengirim')->textInput(['maxlength' => true]) ?>
<div class="col-md-12" style="margin-left:-1%;">

    <?//= $form->field($model, 'kd_kategori')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pengirim')->textarea(['rows' => 7]) ?>
	<?= $form->field($model, 'id_pengirim')->textInput(['rows' => 17]) ?>
    <?= $form->field($model, 'no_hp')->textInput(['rows' => 17]) ?>

    <?//= $form->field($model, 'tgl_posting')->textInput() ?>

    <?//= $form->field($model, 'kd_user')->textInput(['maxlength' => true]) ?>
	
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
