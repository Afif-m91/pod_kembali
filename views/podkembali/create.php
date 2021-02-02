<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Tambah STT ';
$this->params['breadcrumbs'][] = ['label' => 'Podkembali', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkembali-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
