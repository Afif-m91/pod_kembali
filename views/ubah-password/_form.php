<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>
<section class="content" style="padding: 0px;">
  <div class="content-wrapper-1">

<div class="box box-primary" style="overflow:hidden;padding:10px 0px 15px 0px;">
<div class="col-md-12">

<form id="role-form" name="loginuser-form" class="form-validasi form-horizontal" method="post" action="<?= Yii::$app->request->baseUrl ?>/ubah-password/simpan">
<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label col-md-4">Password Lama</label>
                <div class="col-md-8">
                	<input type="password" name="oldpass" id="oldpass" class="form-control" required data-error="Password lama belum diisi" />
                	<div class="help-block with-errors"></div>
				</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label col-md-4">Password Baru</label>
                <div class="col-md-8">
                	<input type="password" name="newpass" id="newpass" class="form-control" required data-error="Password baru belum diisi" />
                	<div class="help-block with-errors"></div>
				</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label col-md-4">Konfirmasi Password Baru</label>
                <div class="col-md-8">
                	<input type="password" name="cnewpass" id="cnewpass" class="form-control" required data-match="#newpass" data-match-error="Password baru tidak sama dengan konfirmasi password" data-error="Konfirmasi Password belum diisi" />
                	<div class="help-block with-errors"></div>
				</div>
            </div>
        </div>
    </div>

<hr style="border-color: #c7c7c7;margin: 10px 0;">

<div class="box-footer"> 
    <button class="btn btn-success jarak-kanan" type="submit" id="simpan"><?php echo ($isNewRecord)?'Ubah':'Ubah';?></button>
    <input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />
</div>
</form>
<div class="modal-loading-new"></div>
</div>
</div>
</div>
<section>
