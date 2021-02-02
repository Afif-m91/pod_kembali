<?php

/* @var $this yii\web\View */

$this->title = 'Selamat Datang '.Yii::$app->user->identity->Name.', Di System POD Kembali SPL Cargo';
?>

<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">


<div class="box box-primary" style="padding:10px 0px 15px 0px;">
<div class="col-md-12">           								
              <!-- User image -->
  <div class="col-md-2">  
                   <img src="<?php echo Yii::$app->request->baseurl; ?>/GaleriFoto/<?= Yii::$app->user->identity->Foto ?>"  alt="User Image" style="width:120px;Height:130px;">             
            </div>
<div class="col-md-8">  
<div style="font-size:16px;font-weight:bold;">
                Nama User : <?= Yii::$app->user->identity->Name ?>  </br>
</div>
				Jabatan : <?= Yii::$app->user->identity->Jabatan ?>	</br>
				Telp : <?= Yii::$app->user->identity->Telepon ?></br>
				Email : <?= Yii::$app->user->identity->Email ?>

            </div>
<div class="col-md-2">  
                   <img src="<?php echo Yii::$app->request->baseurl; ?>/web/image/261218spl-logo.png"  alt="User Image" style="width:140px;Height:90px;">             
            </div>

</div> 
<div class="container">
 <div class="col-md-12" style="font-size:17px;text-align:justify;">     
 <hr>
 </div>
 <div class="col-md-3">
 <div class="alert alert-success">
 <i class="fa fa-file-o" style="font-size:36px;"></i>
 <br>
 <h4>
 <?php 
$conn=mysqli_connect("localhost","root","","pod_kembali_spl");

$result=mysqli_query($conn, "SELECT *,COUNT(*) as `count` FROM stt WHERE status='done' GROUP BY `status`");
while($comp=mysqli_fetch_array($result)) {
  echo "<p>Data STT Yang Sudah Kembali : </p>"; echo $comp['done'].' '.$comp['count'];
}
?> </h4>
</div>
</div>
<div class="col-md-3">
<div class="alert alert-danger">
<i class="fa fa-file-o" style="font-size:36px;"></i>
<br>
<h4>
<?php 
$result=mysqli_query($conn, "SELECT *,COUNT(*) as `count` FROM stt WHERE status='$status' GROUP BY `status`");
while($comp=mysqli_fetch_array($result)) {
  echo "<p>Data STT Yang Belum Kembali : </p>"; echo $comp['status'].' '.$comp['count'];
}
?></h4>
</div>
</div>
<div class="col-md-3">
<div class="alert alert-info">
<i class="fa fa-file-o" style="font-size:36px;"></i>
<br>
<h4>
<?php 
$result=mysqli_query($conn, "SELECT count(*) as total from stt");
$data=mysqli_fetch_assoc($result);

echo "<p>Total Data :</p> <br> ";echo $data['total'];
?></h4>
</div>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>
</div>
</div>
</div>

</div>
<section>