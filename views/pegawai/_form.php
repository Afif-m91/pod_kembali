<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Jabatan;
use app\models\Statuspegawai;
use app\models\Lokasi;
use kartik\datecontrol\Module;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="pegawai-form">

    <?php 
 $form = ActiveForm::begin([
                'id' => 'pegawai-form',

                'options'=>['enctype'=>'multipart/form-data'] ,
           
    ]);
	?>

    <?//= $form->field($model, 'KdPegawai')->textInput(['maxlength' => true]) ?>
	<?php if (!$model->isNewRecord){
   echo '<img src="../GaleriFoto/'.$model['foto'].'" width="120px" height="120px" >';
   } ?> <br/></br>
    <?= $form->field($model, 'NIK_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true]) ?>

	
    <?= $form->field($model, 'kd_status')->dropDownList(ArrayHelper::map(Statuspegawai::Find()->all(),'kd_status','nama_status'),['prompt'=>'Pilih Status Pegawai'])->label('Status Pegawai'); ?>
    <?= $form->field($model, 'kd_jabatan')->dropDownList(ArrayHelper::map(Jabatan::Find()->all(),'kd_jabatan','nama_jabatan'),['prompt'=>'Pilih Jabatan'])->label('Jabatan Pegawai'); ?>
	
    <?= $form->field($model, 'jenis_kelamin')->RadioList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => ''],['separator'=>'<br>']) ?>

    <?= $form->field($model, 'no_identitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
	
<div class="col-md-4" style="margin-left:-1%;">
    <?= $form->field($model, 'no_hp')->textInput(['type'=>'number','maxlength' => true]) ?>
</div>
<div class="col-md-8" style="margin-left:1%;">
    <?= $form->field($model, 'email')->textInput(['type'=>'email','maxlength' => true]) ?>
</div>
    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'TanggalLahir')->textInput(['type'=>'date']) ?>
	  <?=
                        $form->field($model, 'tgl_lahir')->widget(DateControl::className(), [
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
		 <?=
                        $form->field($model, 'tgl_join')->widget(DateControl::className(), [
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
										
   <div class="form-group" >
                         <?php
                          echo $form->field($model, 'foto')->widget(FileInput::classname(), [
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
