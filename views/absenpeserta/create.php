<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Absenpeserta */

$this->title = 'Absensi Peserta Training';
$this->params['breadcrumbs'][] = ['label' => 'Absenpesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absenpeserta-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
