<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatuspegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Status Pegawai SPL Cargo';
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
<div class="statuspegawai-index">

    <h1><?//= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Status Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<fieldset class="group-border">
        <legend class="group-border">Daftar Status Pegawai</legend>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kd_status',
            'nama_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	</fieldset>
</div>
