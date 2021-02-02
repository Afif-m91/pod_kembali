<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Loginuser */

$this->title = 'Tambah Pengguna Baru';
$this->params['breadcrumbs'][] = ['label' => 'Loginusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loginuser-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
