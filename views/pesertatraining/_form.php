<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\Module;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Pesertatraining */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="pesertatraining-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'KdPeserta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NamaPeserta')->textInput(['maxlength' => true]) ?>
	<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-2">
    <?= $form->field($model, 'JenisKelamin')->RadioList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>
	</div></div>
	<?= $form->field($model, 'PekerjaanPeserta')->textInput(['maxlength' => true]) ?>
	<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-3">
    <?= $form->field($model, 'TempatLahir')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-md-4">
    <?//= $form->field($model, 'TanggalLahir')->textInput() ?>
	 <?=
                        $form->field($model, 'TanggalLahir')->widget(DateControl::className(), [
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
	</div></div>
    <?= $form->field($model, 'AlamatPeserta')->textarea(['rows' => 3]) ?>
<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-3">
    <?= $form->field($model, 'KontakPeserta')->textInput(['type' => 'number']) ?>
	</div>
	<div class="col-md-4">
    <?= $form->field($model, 'EmailPeserta')->textInput(['type' => 'email']) ?>
	</div>
	<div class="col-md-4">
    <?= $form->field($model, 'NoIdentitas')->textInput(['type' => 'number']) ?>
	</div>
	</div>
    <?= $form->field($model, 'NamaPerusahaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AlamatPerusahaan')->textarea(['rows' => 3]) ?>

    <?//= $form->field($model, 'TrainingDate')->textInput() ?>

    <?//= $form->field($model, 'TrainingEndDate')->textInput() ?>

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