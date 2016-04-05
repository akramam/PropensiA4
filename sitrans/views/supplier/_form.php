<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsupplier')->textInput() ?>

    <?= $form->field($model, 'namasupplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telponsupplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamatsupplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rekening')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
