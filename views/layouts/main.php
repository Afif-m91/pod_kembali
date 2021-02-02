<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use dmstr\web\AdminLteAsset;
use dmstr\widgets\Alert;
use kartik\widgets\SideNav;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use kartik\widgets\Growl;
//use mdm\admin\components\MenuHelper;
use yii\db\Query;
use yii\db\Command;
use app\models\Menu;

AppAsset::register($this);
if (Yii::$app->controller->action->id === 'login') {
		echo $this->render('wrapper-black', ['content' => $content]);
	} else {		
		AdminLteAsset::register($this);
    ?>

   <?php $this->beginPage() ?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <?= Html::csrfMetaTags() ?>
			<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseurl; ?>/web/pav.png" type="image/x-icon"/>
            <title><?//= Html::encode($this->title) ?>System POD Kembali SPL Cargo</title>
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <?php $this->head() ?>
  
        </head>

        <body class="skin-green fixed<?php echo ($mdlnya == "autentikasi" && $cntnya == "ubah-password")?' sidebar-collapse':'';?>">
            <?php $this->beginBody() ?>
            <div class="wrapper">
                <header class="main-header">
                    <a href="<?= \Yii::$app->homeUrl ?>" class="logo">
                    	 <img alt="admin" src="<?php echo Yii::$app->request->baseurl; ?>/web/image/261218spl-logo.png" style="height:110%; margin-left:-15px;">
					</a>

                    <nav class="navbar navbar-static-top" Level="navigation">
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" Level="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>

                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <?php if (Yii::$app->user->identity->Level =="")
										{ } else{?>
                                    <!-- Messages: style can be found in dropdown.less-->
                                    <li class="dropdown user user-menu">
                                     
										  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="<?php echo Yii::$app->request->baseurl; ?>/GaleriFoto/<?= Yii::$app->user->identity->Foto ?>" class="user-image" alt="User Image">
										<span class="hidden-xs"><?= Yii::$app->user->identity->Name ?> </span>
										</a>
                                        <ul class="dropdown-menu">
                                            <li class="user-header bg-light-blue">
                                                <img alt="admin"  src="<?php echo Yii::$app->request->baseurl; ?>/GaleriFoto/<?= Yii::$app->user->identity->Foto ?>">
                                                <p>
                                                    <?= Yii::$app->user->identity->Name ?>
                                                    <small><?= Yii::$app->user->identity->Email ?></small>
                                                </p>
                                            </li>
                                            <li class="user-footer">
                                                <div class="pull-left">
                                                    <a href="<?= Url::to(['/ubah-password/index']) ?>"
                                                       class="btn btn-default btn-flat">Ubah Password</a>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="<?= Url::to(['/site/logout']) ?>"
                                                       class="btn btn-default btn-flat" data-method="post">Sign out</a>
                                                </div>
                                            </li>
                                        </ul>
										
                                    </li>
								<?php } ?>
                                
                            </ul>
                        </div>
				
				 <h5 style="margin:0px;padding:0px;text-align:left;margin-top:5px;">
                            <img src="<?php echo Yii::$app->request->baseurl; ?>/web/image/header-text.JPG" width="700px" height="40px">
                        </h5>
					
                    </nav>
                </header>

                <aside class="main-sidebar">
				 <section class="sidebar">
				 <ul class="sidebar-menu">
			<li class="header" style="background:#2a8cbd; color:#b8c7ce; font-size:14px;"> &nbsp<i class="fa fa-laptop"></i> &nbsp 
<?php echo date('d-M-Y'); ?> || 
<span id="clock"> <?php print date('H:i:s'); ?></span>
</li>
   <?php if(Yii::$app->user->identity->Level =='A01'){ ?>
<li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Master</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=Yii::$app->request->baseurl.'/pegawai' ?>"><i class="fa fa-circle-o"></i> Data Pegawai</a></li>
            <li><a href="<?=Yii::$app->request->baseurl.'/statuspegawai' ?>"><i class="fa fa-circle-o"></i> Status Pegawai</a></li>
            <li><a href="<?=Yii::$app->request->baseurl.'/jabatan' ?>"><i class="fa fa-circle-o"></i> Jabatan Pegawai</a></li>
          </ul>
        </li> 
   <?php } if(Yii::$app->user->identity->Level =='A01' || Yii::$app->user->identity->Level =='A02') {?>
   
<li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i> <span>Pengirim & Penerima</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  
            <li><a href="<?=Yii::$app->request->baseurl.'/pengirim' ?>"><i class="fa fa-circle-o"></i> Pengirim</a></li>
		 <?php if(Yii::$app->user->identity->Level =='A01' || Yii::$app->user->identity->Level =='A02'){ ?>
            <li><a href="<?=Yii::$app->request->baseurl.'/penerima' ?>"><i class="fa fa-circle-o"></i> Penerima</a></li>
		   <?php } ?>
          </ul>
        </li> 	
   <?php } if(Yii::$app->user->identity->Level =='A01' || Yii::$app->user->identity->Level =='A02'){ ?>  
<li class="treeview">
          <a href="#">
            <i class="fa fa-retweet"></i> <span>POD Kembali</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=Yii::$app->request->baseurl.'/podkembali' ?>"><i class="fa fa-circle-o"></i> Lihat STT</a></li>
			<?php if(Yii::$app->user->identity->Level =='A01' || Yii::$app->user->identity->Level =='A02'){ ?>
            <li><a href="<?=Yii::$app->request->baseurl.'/import/stt_importxls.php'?>"><i class="fa fa-circle-o"></i> Upload STT</a></li>
			<li><a href="<?=Yii::$app->request->baseurl.'/podkembali/scan' ?>"><i class="fa fa-circle-o"></i> Update Status</a></li>
			<?php } ?>
          </ul>
        </li> 	
   <?php } if(Yii::$app->user->identity->Level =='A01' || Yii::$app->user->identity->Level =='A02'){ ?>
	<li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Laporan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=Yii::$app->request->baseurl.'/laporan' ?>"><i class="fa fa-circle-o"></i> Export Laporan</a></li>
            <!--li><a href="<?=Yii::$app->request->baseurl.'/feedbacktraining/create' ?>"><i class="fa fa-circle-o"></i> Isi Cabang Form</a></li-->
          </ul>
        </li> 
   <?php } ?>
	<?php if(Yii::$app->user->identity->Level =='A01' || Yii::$app->user->identity->Level =='A02'){ ?>

 
	<?php } if(Yii::$app->user->identity->Level =='A01') { ?>
<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>User Aplikasi</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=Yii::$app->request->baseurl.'/loginuser/create' ?>"><i class="fa fa-circle-o"></i> Buat User Baru</a></li>
            <li><a href="<?=Yii::$app->request->baseurl.'/loginuser' ?>"><i class="fa fa-circle-o"></i> Lihat Daftar User</a></li>
          </ul>
        </li> 
	<?php } if($_SESSION['user']!="") { ?>	
<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Peserta</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=Yii::$app->request->baseurl.'/absenpeserta/create' ?>"><i class="fa fa-circle-o"></i> Lakukan Absensi</a></li>
			<li><a href="<?=Yii::$app->request->baseurl.'/feedbacktraining/create' ?>"><i class="fa fa-circle-o"></i> Isi Feedback Form</a></li>
          </ul>
        </li> 
	<?php } ?>		
			</ul>
				</section> 
                </aside>

                <div class="content-wrapper">
				<?php if (Yii::$app->user->identity->Level =='A01') {
					?>
                 <section class="content-header" style="padding:10px 0px 9px;">
                        <h1 style="margin-left:15px; font-size:16px; font-weight:bold;"><?= $this->title ?></h1>
                    </section>
				<?php } else { ?>
				<section class="content-header" style="padding:10px 0px 9px;">
                        <h1 style="margin-left:15px; font-size:16px; font-weight:bold;"><?= $this->title ?></h1>
                    </section>
					<?php } ?>
                    

                    <section class="content" style="padding:65px 15px 15px;">
						<?php 
							foreach (Yii::$app->session->getAllFlashes() as $message){
								echo Growl::widget([
									'type' 	=> (!empty($message['type'])) ? $message['type'] : 'danger',
									'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Informasi',
									'icon' 	=> (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
									'body' 	=> (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
									'delay' => 1,
									'showSeparator' => true,
									'pluginOptions' => [
										'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000,
										'placement' => [
											'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
											'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'center',
										],
										'showProgressbar' => (!empty($message['showProgressbar'])) ? $message['showProgressbar'] : false,
									]
								]);
							}
						?>
                        <?= $content ?>
                    </section>
                </div>

                <footer class="main-footer">
                    <strong style="color:#5b5b5b;font-size: 12px;font-weight: bold;">&copy; Copyright 2019
                    <small style="color:#1c7aa9;font-size: 12px;font-weight: normal;"> &nbsp;: : &nbsp; SPL Cargo</small></strong>
                </footer>
            </div>

    <?php $this->endBody() ?>
        </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>

<script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
	//$(document).ready(function(){
	//$(".slimScrollDiv").add(); })
</script>
<body onload="setInterval('displayServerTime()', 1000);">
