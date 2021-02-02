<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Wilayah;
use app\models\Kategori;

/* @var $this yii\web\View */
/* @var $model app\models\Klien */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="klien-form">
 <?php 
 $form = ActiveForm::begin([
                'id' => 'klien-form',

                'options'=>['enctype'=>'multipart/form-data'] ,
           
    ]);
	?>
	<?php if (!$model->isNewRecord){
	if ($model['gambar']!=''){
		echo '<img src="../FileClient/'.$model['gambar'].'" width="140px" height="140px">';
	}else{
   echo '<img src="../FileClient/default.png" width="140px" height="140px">';
	}
   } ?> <br/>
    <?//= $form->field($model, 'kd_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_klien')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

<div class="col-md-12" style="margin-left:-3%;">

    <?//= $form->field($model, 'kd_kategori')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_klien')->textarea(['rows' => 17]) ?>

    <?//= $form->field($model, 'kd_wilayah')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'tgl_posting')->textInput() ?>

    <?//= $form->field($model, 'kd_user')->textInput(['maxlength' => true]) ?>
	 <div class="form-group" >
                         <?php
                          echo $form->field($model, 'gambar')->widget(FileInput::classname(), [
                            'options' => ['accept'=>'image/*'],
                            'pluginOptions' => [
                                'showPreview' => true,
                                'showUpload' => false,
                                'showRemove' => false,
                'showClose' => false,
                                'showCaption'=> false,
                                'allowedFileExtension' => ['jpg'],
                                'maxFileSize'=> 3027,
                                'browseLabel'=>'Unggah Foto',
                            ]
                        ])->label('');


                           
                        ?>

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
</section>
