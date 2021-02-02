<?php
session_start();
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\db\Command;

/* @var $this yii\web\View */
/* @var $model app\models\Absenpeserta */
/* @var $form yii\widgets\ActiveForm */
?>
<?php  if($_SESSION['user']=="")
{
	 echo"<script>location='../course' </script>";
}
?>
<div class="absenpeserta-form">

    <?php $form = ActiveForm::begin(); ?>
	
<legend> Bagi peserta training yang belum melakukan absen pada sesi training, silahkan melakukan absen pada menu ini. </legend> <p>
    <?//= $form->field($model, 'KdAbsen')->textInput() ?>
<input type="hidden" name="peserta" value="<?php echo $_SESSION['user']; ?>">
<input type="hidden" name="mapping" value="<?php echo $_SESSION['mapping']; ?>">
<div hidden='hidden'>
    <?= $form->field($model, 'KdPeserta',['inputOptions'=>['value'=>'2']])->Input(['maxlength' => true]) ?>
	</div>
    <?//= $form->field($model, 'KdMapping')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'TanggalAbsen')->textInput() ?>

    <?php
		date_default_timezone_set('Asia/Jakarta');
		$Key  = new Query;
        $connection = \Yii::$app->db;
        $query = "select count(KdPeserta)as jumlah from absenpeserta where KdPeserta='".$_SESSION['user']."' and TanggalAbsen='".date('Y-m-d')."' ";
        $Key = $connection->createCommand($query)->queryOne();
			
		if ($Key['jumlah']==0)
		{
	?>
    <div class="form-group">
	
        <?= Html::submitButton($model->isNewRecord ? 'Lakukan Absen Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','data' => [
                'confirm' => 'Lakukan Absen Sekarang ?',
                'method' => 'post',
            ],]) ?>
    </div>
		<?php } else{?>
		<input type="button" class="btn btn-primary" value=" <?php echo $_SESSION['nama']; ?> Telah Melakukan Absen Hari Ini">
		<?php }?>
    <?php ActiveForm::end(); ?>

</div>
