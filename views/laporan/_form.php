<?php

use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pengirim;
use app\models\PodKembali;


/* @var $this yii\web\View */
/* @var $model app\models\Provinsi */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="laporan-form">

   <?php 
 $form = ActiveForm::begin([
                'id' => 'laporan-form',

                'options'=>['enctype'=>'multipart/form-data'] ,
           
    ]);
	?>

<div class="col-md-6">
<?
  echo '<label class="control-label">Tanggal Awal</label>';
echo DatePicker::widget([
    'name' => 'tgl_awal',
    'options' => ['placeholder' => 'Pilih Tanggal'],
    'pluginOptions' => [
        'todayHighlight' => true,
        'todayBtn' => true,
        'format' => 'dd-M-yyyy',
        'autoclose' => true,
    ]
]);
?>
<br>
<?
   echo '<label class="control-label">Tanggal Akhir</label>';
echo DatePicker::widget([
    'name' => 'tgl_akhir',
    'options' => ['placeholder' => 'Pilih Tanggal'],
    'pluginOptions' => [
        'todayHighlight' => true,
        'todayBtn' => true,
			'startAttribute'=>'datetime_min',
				'endAttribute'=>'datetime_max',
					'format' => 'dd-M-yyyy',
					'autoclose' => true,
    ]
]);
?>
<?//= $form->field($model, 'kd_pengirim')->dropDownList(ArrayHelper::map(Pengirim::Find()->all(),'kd_pengirim','nama_pengirim'),['prompt'=>'Pilih Pengirim'])->label('Nama Pengirim'); ?>
<br>
  
<br>
  <div class="form-group">
    <a href="export_excel.php" type="button" class="btn btn-success" target="_BLANK" >
		<span class="glyphicon glyphicon-export"></span> Export Excel</a>
		
	<a href="export_excel.php" type="button" class="btn btn-primary" target="_BLANK" >
		<span class="glyphicon glyphicon-export"></span> Export PDF</a>	
   	<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
    </div>

  
</div>
<div class="col-md-6">
  
   
</div>
</div>
</div>
</div>
 <?php ActiveForm::end(); ?>
</div>
<section>