<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="podkembali-search">



    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="row">
<div class="col-md-3">

	<? /*=                 $form->field($model, 'tgl_kirim')->widget(DateControl::className(), [
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
						
                       */ ?>	
						
						
</div>
<div class="col-md-3">

	<?/* =                 $form->field($model, 'tgl_terima')->widget(DateControl::className(), [
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
						
                     */   ?>	
						
						
</div>


</div>


<div class="col-md-3">
	
         <div class="form-group" style="margin-left:-13px;">
		 
            <?php $model->cari=$_GET['PodkembaliSearch']['cari'];?>
			
            <?= $form->field($model, 'cari')->input('cari', ['placeholder' => "Pencarian Data"])->label(false) ?>
			
         </div>
		  
</div>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?php
        ?>
        <?= Html::a('Refresh', ['/podkembali/'], ['class'=>'btn btn-default']) ?>
    </div> 

    <?php ActiveForm::end(); ?>

</div>
