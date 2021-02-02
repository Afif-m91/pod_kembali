<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mappingkelas */

$this->title = 'Buat Mapping Kelas';
$this->params['breadcrumbs'][] = ['label' => 'Mappingkelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mappingkelas-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelDetail' => $modelDetail,
		'dataProvider'=>$dataProvider
    ]) ?>

</div>
