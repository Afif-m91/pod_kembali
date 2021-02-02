<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pegawai;
use app\models\Akseslevel;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Loginuser */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="loginuser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'KdUser')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'KdPegawai')->textInput(['maxlength' => true]) ?>
	<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-9">
	 <?= $form->field($model, 'kd_pegawai')->dropDownList(ArrayHelper::map(Pegawai::Find()->all(),'kd_pegawai','nama_pegawai'),['prompt'=>'Pilih Pegawai'])->label('Nama Pegawai'); ?>
	</div></div>
    <?//= $form->field($model, 'KdAksesLevel')->textInput() ?>
	<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-3">
	<?= $form->field($model, 'kd_akses_level')->dropDownList(ArrayHelper::map(Akseslevel::Find()->all(),'kd_akses_level','nama_akses_level'),['prompt'=>'Pilih Akses Level'])->label('Akses Level'); ?>
	</div>
	<div class="col-md-3">
    <?= $form->field($model, 'status_user')->dropDownList([ '1' => 'Aktif', '0' => 'NonAktif', ], ['prompt' => 'Pilih Status Pengguna']) ?>
	</div>
	<div class="col-md-3">
	<?php if ($model->isNewRecord)
	{?>
    <?= $form->field($model, 'password')->passwordInput(['type' => 'password'],['maxLength'=>true]) ?>
	<?php } ?>
	</div>
	</div>
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
