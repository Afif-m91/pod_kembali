<?php
session_start();
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use kartik\widgets\radioButtonList;
/* @var $this yii\web\View */
/* @var $model app\models\Feedbacktraining */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">
<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">
<div class="feedbacktraining-form">
<?php  if($_SESSION['user']=="")
{
	 echo"<script>location='../course' </script>";
}
?>
    <?php $form = ActiveForm::begin(); ?>
	<input type="hidden" name="peserta" value="<?php echo $_SESSION['user']; ?>">
	<input type="hidden" name="mapping" value="<?php echo $_SESSION['mapping']; ?>">
    <?//= $form->field($model, 'KdFeedbackTraining')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'KdMapping')->textInput(['maxlength' => true]) ?>
	<div hidden='hidden'>
    <?= $form->field($model, 'KdPeserta',['inputOptions'=>['value'=>'2']])->Input(['maxlength' => true]) ?>
	</div>
    <?//= $form->field($model, 'TanggalIsi')->textInput() ?>

    <?//= $form->field($model, 'Jam')->textInput() ?>
	<b>Selamat Datang <?php echo $_SESSION['nama']; ?>, Berikan kami penilaian terhadap training yang kami lakukan, Terima Kasih..</b> </br></br>
	<?php
	$no=1;
 foreach ($modelForm as $valuefeedback) {   
              ?>
              <div class="col-md-12 <?php echo"f".$valuefeedback['KdFeedback']; ?>" style="margin-bottom: 15px;margin-left:-10%;" id="<?= $valuefeedback['KdFeedback']?>">
                  <div class="col-sm-1" style="text-align:center">
                     <input type="checkbox" hidden="hidden" name="Feedbackform[KdFeedback][]" checked="checked" value="<?= $valuefeedback['KdFeedback']?>" id="cekbox">
                  </div>
                  <div class="col-sm-10">
				  <b><?php echo $valuefeedback['Keterangan']?></b><br>
				  <?php echo $valuefeedback['DeskripsiFeedback']?><br>
				   <div class="col-sm-5">
				  <?php
                                 $list = [' '=> 'Select Suggestions',
								 'Very dissatisfied (sangat tidak puas)'=> 'Very dissatisfied (sangat tidak puas)',
                                 'Dissatisfied (tidak puas)' => 'Dissatisfied (tidak puas)', 
                                 'Fair (cukup)' => 'Fair (cukup)',
                                 'Satisfied (memuaskan)' => 'Satisfied (memuaskan)',
                                 'Very Satisfied (sangat puas)'=>'Very Satisfied (sangat puas)'];
                                 echo $form->field($modelDetail, 'FeedbackPoint[]')->dropDownList($list); ?>
					</div>
                      <input type="hidden" class="form-control" id="DeskripsiFeedback" name="DeskripsiFeedback[]" value="<?php echo $valuefeedback['DeskripsiFeedback']?>">
                  </div>
              </div>
              <?php
               $no++;
                  } ?>
  <div class="form-group col-md-12" >
  <hr>
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</section>
