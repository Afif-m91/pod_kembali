<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\Module;
use app\models\Ruangan;
use app\models\Materi;
use app\models\Pesertatraining;
use app\models\Pegawai;
use app\models\Requestkelas;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
use yii\bootstrap\Modal;
use yii\helpers\Url
/* @var $this yii\web\View */
/* @var $model app\models\Mappingkelas */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$this->registerJs("
$('#mappingkelas-tanggalselesai').change(function(){

if ($('#mappingkelas-tanggalmulai').val() > $('#mappingkelas-tanggalselesai').val())
{
bootbox.dialog({
                message: 'Maaf tanggal selesai harus lebih besar dari tanggal mulai',
                buttons:{
                    ya : {
                        label: 'OK',
                        className: 'btn-warning',
                      
                    }
                }
            });
document.getElementById('mappingkelas-tanggalselesai-disp').value = '';			
}

	if ($('#mappingkelas-tanggalmulai').val() == '')
{
bootbox.dialog({
                message: 'Silahkan masukan tanggal mulai terlebih dahulu',
                buttons:{
                    ya : {
                        label: 'OK',
                        className: 'btn-warning',
                      
                    }
                }
            });
document.getElementById('mappingkelas-tanggalselesai-disp').value = '';			
}
  });
  

");
?>  
  
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="mappingkelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'KdMapping')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'KdPegawai')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'KdPegawai')->dropDownList(ArrayHelper::map(Pegawai::Find()->where('KdJabatan="J02"')->all(),'KdPegawai','NamaPegawai'),['prompt'=>'Pilih Trainer'])->label('Nama Trainer'); ?>
	<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-6">
    <?//= $form->field($model, 'KdRuangan')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'KdRuangan')->dropDownList(ArrayHelper::map(Ruangan::Find()->all(),'KdRuangan','NamaRuangan'),['prompt'=>'Pilih Ruangan'])->label('Ruang Training'); ?>
	</div>
	<div class="col-md-6">
    <?//= $form->field($model, 'KdMateri')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'KdMateri')->dropDownList(ArrayHelper::map(Materi::Find()->all(),'KdMateri','NamaMateri'),['prompt'=>'Pilih Materi'])->label('Materi Training'); ?>
	</div></div>
    <?//= $form->field($model, 'TanggalMulai')->textInput() ?>
	<div class="col-md-12" style="margin-left:-30px;">
	<div class="col-md-3">
	<?=
                        $form->field($model, 'TanggalMulai')->widget(DateControl::className(), [
                            'type' => DateControl::FORMAT_DATE,
                            'ajaxConversion' => false,
                            'options' => [
                                'options' => [
                                    'placeholder' => 'DD-MM-YYYY',
                                    
                                ],
                                'pluginOptions' => [
                                    'startDate' => '2017-01-01',
                                    'endDate' => '+1m',
                                    'autoclose' => true
                                ],
                            ]
                        ]);
                        ?>
		</div>
	<div class="col-md-3" >
    <?//= $form->field($model, 'TanggalSelesai')->textInput() ?>
	<?=
                        $form->field($model, 'TanggalSelesai')->widget(DateControl::className(), [
                            'type' => DateControl::FORMAT_DATE,
                            'ajaxConversion' => false,
                            'options' => [
                                'options' => [
                                    'placeholder' => 'DD-MM-YYYY',
                                    
                                ],
                                'pluginOptions' => [
                                    'startDate' => '2017-01-01',
                                    'endDate' => '+1m',
                                    'autoclose' => true
                                ],
                            ]
                        ]);
                        ?>
		</div>
		<div class="col-md-6">
		<?= $form->field($model, 'KdRequest')->dropDownList(ArrayHelper::map(Requestkelas::Find()->where('KdRequest not in (select KdRequest from mappingkelas)')->all(),'KdRequest','Perusahaan'),['prompt'=>'Pilih Nama Perusahaan'])->label('Dari Request Perusahaan'); ?>
		</div>
		</div>
    <?= $form->field($model, 'Keterangan')->textarea(['rows' => 4]) ?>

<fieldset class="group-border">
        <legend class="group-border">Daftar Peserta</legend>
		<?php if ($model->isNewRecord){ ?>
    <?= $form->field($modelDetail, 'KdPeserta')->checkboxList(ArrayHelper::map(Pesertatraining::Find()->where('KdPeserta not in (select KdPeserta from MappingKelasDetail)')->all(),'KdPeserta','NamaPeserta'),['separator'=>'</br>'])->label('Pilih Peserta Yang Akan di Daftarkan'); ?>
		<?php } else {?>
		<?= $form->field($modelDetail, 'KdPeserta')->checkboxList(ArrayHelper::map(Pesertatraining::Find()->all(),'KdPeserta','NamaPeserta'),['separator'=>'</br>'])->label('Pilih Peserta Yang Akan di Daftarkan'); ?>
		<?php } ?>
	</fieldset>
	
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

