<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenjualanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idjual') ?>

    <?= $form->field($model, 'idbayar') ?>

    <?= $form->field($model, 'produk') ?>

    <?= $form->field($model, 'tgl_jual') ?>

    <?= $form->field($model, 'tgl_kirim') ?>

    <?php // echo $form->field($model, 'jatuh_tempo') ?>

    <?php // echo $form->field($model, 'jam_kirim') ?>

    <?php // echo $form->field($model, 'cara_kirim') ?>

    <?php // echo $form->field($model, 'cara_bayar') ?>

    <?php // echo $form->field($model, 'status_del') ?>

    <?php // echo $form->field($model, 'harga_total') ?>

    <?php // echo $form->field($model, 'karton') ?>

    <?php // echo $form->field($model, 'kilo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
