<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
use app\models\Provinsi;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Requestkelas */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

  <fieldset class="group-border">
  <?php if($model->isNewRecord) {?>
        <legend class="group-border">Penerima</legend>
 <?php } else{?>
  <legend class="group-border"></legend>
  <?php }?>
<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="penerima-form">

    <?php $form = ActiveForm::begin(); ?>
	
	
    <?//= $form->field($model, 'KdRequest')->textInput() ?>

    <?//= $form->field($model, 'KdPegawai')->textInput(['maxlength' => true]) ?>
<div class="col-md-12" style="margin-left:-30px;">
<?php if(!$model->isNewRecord) {?>
  <?php }?>
	
</div>
    
    <?//= $form->field($model, 'KdMateri')->textInput(['maxlength' => true]) ?>
<div class="col-md-12" style="margin-left:-30px;">
<div class="col-md-8">
<?= $form->field($model, 'nama_penerima')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'alamat_penerima')->textarea(['rows' => 4]) ?>
</div>
<div class="col-md-8">
    <?= $form->field($model, 'no_hp')->textInput(['type'=>'number']) ?>
</div>
<div class="col-md-8">
     <?=
                        $form->field($model, 'tgl_penerima')->widget(DateControl::className(), [
                            'type' => DateControl::FORMAT_DATE,
                            'ajaxConversion' => false,
                            'options' => [
                                'options' => [
                                    'placeholder' => 'DD-MM-YYYY',
                                    
                                ],
                                'pluginOptions' => [
                                    'startDate' => '1965-01-01',
                                    //'endDate' => $now ,
                                    'autoclose' => true
                                ],
                            ]
                        ]);
						
                        ?>
</div>
</div>

<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
<section>
