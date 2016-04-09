<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>SITRANS</b>HGH</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Please fill out the following fields to login:</p>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username', [
            "template"=>"<span class=\"glyphicon glyphicon-user form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])->textInput(['autofocus' => true, 'placeholder'=>Yii::t('app', $model->getAttributeLabel('username'))]) ?>

        <?= $form->field($model, 'password', [
            "template"=>"<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])->passwordInput(['placeholder'=>Yii::t('app', $model->getAttributeLabel('password'))]) ?>

        <div class="row">
             <div class="col-xs-8">
                
            </div><!-- /.col -->
             <div class="col-xs-4">
                 <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
             </div>
         </div>

    <?php ActiveForm::end(); ?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
