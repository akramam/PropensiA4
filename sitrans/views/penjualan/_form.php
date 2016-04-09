<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idjual')->textInput() ?>

    <?= $form->field($model, 'idbayar')->textInput() ?>

    <?= $form->field($model, 'produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_jual')->textInput() ?>

    <?= $form->field($model, 'tgl_kirim')->textInput() ?>

    <?= $form->field($model, 'jatuh_tempo')->textInput() ?>

    <?= $form->field($model, 'jam_kirim')->textInput() ?>

    <?= $form->field($model, 'cara_kirim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cara_bayar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_del')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_total')->textInput() ?>

    <?= $form->field($model, 'karton')->textInput() ?>

    <?= $form->field($model, 'kilo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
