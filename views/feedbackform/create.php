<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Feedbackform */

$this->title = 'Tambah Feedback Baru';
$this->params['breadcrumbs'][] = ['label' => 'Feedbackforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbackform-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
