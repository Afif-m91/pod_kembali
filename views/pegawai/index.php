<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pegawai Sinarmas Pelangi Cargo';
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
<div class="pegawai-index">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<fieldset class="group-border">
        <legend class="group-border">Daftar Nama Pegawai</legend>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'KdPegawai',
            'NIK_pegawai',
            'nama_pegawai',
            [
        	'attribute' => 'kd_jabatan',
        	'value' => function($data) {
        		return $data->jabatan->nama_jabatan;
        	}
        ],
            // 'KdLokasi',
            'jenis_kelamin',
            // 'NoIdentitas',
            //'Alamat:ntext',
             'no_hp',
             'email:email',
            // 'TempatLahir',
            // 'TanggalLahir',
            // 'FotoPegawai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</fieldset>
</div>
