<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data STT SPL Cargo';
$this->params['breadcrumbs'][] = $this->title;
?>
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
<div class="podkembali-index">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah STT', ['create'], ['class' => 'btn btn-success']) ?>
	<!-- <a href="export_excel.php" type="button" class="btn btn-primary" target="_BLANK" >
		<span class="fa fa-cloud-download"></span> Unduh File</a> -->
    </p>
	
<fieldset class="group-border">
        <legend class="group-border">Daftar STT</legend>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_awb',
            
            'penerima',
            'alamat_penerima',
             'kota',
			'kilo',
			'koli',
			'tgl_kirim',
			'tgl_terima',
			'nama_penerima',
			'jenis_barang',
			[
                'attribute' => 'status',
                'label' => 'status',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($data) {
                    if ($data->status ==Done) {
                        return '<span class="label label-success">Done</span>';
                    } else {
                        return '<span class="label label-danger">Not Done</span>';
                    }
                }
            ],
			//'kd_user',
			'remarks',
			'keterangan',
            ['class' => 'yii\grid\ActionColumn'],
        ],
		
    ]); ?>
	
</fieldset>
</div>
