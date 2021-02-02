<?php

use app\assets\AppAsset;
use kartik\widgets\ActiveForm;
use yii\debug\Module;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $form ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="form-box" id="login-box" style="width:30%; margin:auto; margin-top:10%;" >
<div id="borderd">
    <?php $this->off(View::EVENT_END_BODY, [Module::getInstance(), 'renderToolbar']); ?>
    <div class="header"><?= Html::encode($this->title) ?></div>




    <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'enableAjaxValidation' => false,
                'fieldConfig' => [
                    'autoPlaceholder' => false
                ],
                'formConfig' => [
                    'deviceSize' => ActiveForm::SIZE_SMALL,
                    'showLabels' => false
                ]
    ]);
    ?>



    <div class="login-box" style="margin-top:0px; width:80%;  margin:auto; ">

        <div class="login-box-body">
		<img style="width:5%; margin-left:2%;margin-bottom:10px;" >
		 <img style="width:80%; margin-left:2%; margin-bottom:10px;"  src="<?php echo Yii::$app->request->baseurl; ?>/web/image/261218spl-logo.png">
            <h2 style="text-align: center;font-size: 18px;margin: 0% 0px 20px 0px;">Sign in</h2>
			
			 <img alt="admin" style="width:35%; margin-left:32%; margin-bottom:20px;"  src="<?php echo Yii::$app->request->baseurl; ?>/web/image/avatar6.png">

            <?=
            $form->field($model, 'username', [
                'addon' => ['prepend' => ['content' => '<span aria-hidden="true" class="glyphicon glyphicon-user"></span>']]
            ])->input('email', ['placeholder' => 'Email User'])
            ?>

            <?=
            $form->field($model, 'password', [
                'addon' => ['prepend' => ['content' => '<span aria-hidden="true" class="glyphicon glyphicon-lock"></span>']]
            ])->input('password', ['placeholder' => 'Password'])
            ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div class="footer" style="border-top:none;background: none;height: auto;padding-top: 0px;">
                <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
				</br>
            </div>
   
        </div><!-- /.login-box-body -->
		
    </div>
    
	</div>
	
    <?php ActiveForm::end(); ?>
   
</div>
</br>
<strong style="font-size: 12px;font-weight: bold; margin-left:36%;">&copy; Copyright 2019
                    <small style="font-size: 12px;font-weight: normal;"> &nbsp;: : &nbsp; SPL Cargo</small></strong>
