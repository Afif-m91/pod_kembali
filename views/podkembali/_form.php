<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Jabatan;
use app\models\Pengirim;
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
<div class="podkembali-form">

    <?php 
 $form = ActiveForm::begin([
                'id' => 'podkembali-form',

                'options'=>['enctype'=>'multipart/form-data'] ,
           
    ]);
	?>

    <?//= $form->field($model, 'KdPegawai')->textInput(['maxlength' => true]) ?>
<div class="col-md-4" >	
    <?= $form->field($model, 'no_awb')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4" >
    <?= $form->field($model, 'no_do')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4" >
    <?= $form->field($model, 'cart_id')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4" >
<?//= $form->field($model, 'k')->dropDownList(ArrayHelper::map(Pengirim::Find()->all(),'kd_pegawai','nama_pegawai'),['prompt'=>'Pilih Pegawai'])->label('Nama Pegawai'); ?>
	
	<?= $form->field($model, 'id_pengirim')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-8" >
 	<?= $form->field($model, 'penerima')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-12" >
    <?= $form->field($model, 'alamat_penerima')->textarea(['rows' => 6]) ?>
</div>	
<div class="col-md-4" >
  <?= $form->field($model, 'kota')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
      <?= $form->field($model, 'kilo')->textInput(['type'=>'number','maxlength' => true]) ?> 
	  <?= $form->field($model, 'koli')->textInput(['type'=>'number','maxlength' => true]) ?> 
</div>
<div class="col-md-4">
    <?//= $form->field($model, 'TanggalLahir')->textInput(['type'=>'date']) ?>
	  <?=
                        $form->field($model, 'tgl_kirim')->widget(DateControl::className(), [
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
<div class="col-md-4" >				
		 <?=
                        $form->field($model, 'tgl_terima')->widget(DateControl::className(), [
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
<div class="col-md-12" >										
  <?= $form->field($model, 'nama_penerima')->textInput(['maxlength' => true]) ?>
 </div>
<div class="col-md-6" >		
	<?= $form->field($model, 'jenis_barang')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6" >		
	  <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6" >		
     <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6" >		
	<?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6" >	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </div>
</div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div>
</section>
