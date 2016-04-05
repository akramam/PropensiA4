<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idmerk')->textInput() ?>

    <?= $form->field($model, 'idsupplier')->textInput() ?>

    <?= $form->field($model, 'idjenis')->textInput() ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namaproduk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_beli')->textInput() ?>

    <?= $form->field($model, 'harga_jual')->textInput() ?>

    <?= $form->field($model, 'kilo')->textInput() ?>

    <?= $form->field($model, 'karton')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
