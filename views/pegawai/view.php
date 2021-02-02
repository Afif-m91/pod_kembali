<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Kode Pegawai '.$model->kd_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Data Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

<?php if (!$model->isNewRecord){
   echo '<img src="../GaleriFoto/'.$model['foto'].'" width="120px" height="130px">';
   } ?> <br/>
    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kd_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kd_pegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin Akan Menghapus Data Ini?',
                'method' => 'post',
            ],
        ]) ?>
				<input action="action" type="button" value="Kembali" class="btn btn-warning" onclick="history.go(-1);" />

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kd_pegawai',
            'NIK_pegawai',
            'nama_pegawai',
             [
        	'label' => 'Status Pegawai',
        	'value' => $model->statuspegawai->nama_status
        	
        ],
            [
        	'label' => 'Jabatan',
        	'value' => $model->jabatan->nama_jabatan
        	
        ],
			'tgl_join',
            'jenis_kelamin',
            'no_identitas',
            'alamat:ntext',
            'no_hp',
            'email:email',
            'tempat_lahir',
            'tgl_lahir',
            'foto',
        ],
    ]) ?>

</div>
