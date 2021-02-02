<html>
<head>
<style type="text/css">
fieldset.group-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}
legend.group-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
    font-size: 14px;
}
</style>
<script type="text/javasript">
function FocusOnInput()
{
	document.getElementById("awb_no").focus();
}
document.onKeydown=function(evt){
		var keyCode =evt ? (evt.which ? evt.which: evt.keyCode): event.keyCode;
		if(keyCode==13)
		{
			document.kirim.submit();
		}
}
</script>
<?php
$this->title = 'Scan Barcode';
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

?>
<body onload="FocusOnInput()">
<div class="podkembali-index">
<fieldset class="group-border">
<legend class="group-border">Silahkan Scan STT Barcode Disini</legend>
<?php 
$conn=mysqli_connect("localhost","root","","pod_kembali_spl");
?>
<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div class='alert alert-danger'>Tidak Ada No AWB Pada Database</div>";
			}
		}
?>
<form name="kirim" action="../Barcode/actionBarcode.php" method="POST">
<input type="text" class="form-control" name="awb_no" id="awb_no" autofocus>
<input type="hidden" class="form-control" name="usernya" value="<?php echo Yii::$app->user->identity->Name; ?>">
</input>

</p>
<legend class="control-label">
Status </p>
</legend>
<select class="form-control" name="status">
<option value="Done">Done</option>
<option value="Not Done"> Not Done </option>
</select>

</form>
</fieldset>

</div>

</body>

</html>
</head>

