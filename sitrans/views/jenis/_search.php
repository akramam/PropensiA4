<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idjenis') ?>

    <?= $form->field($model, 'namajenis') ?>

    <?= $form->field($model, 'rop') ?>

    <?= $form->field($model, 'stok_kilo') ?>

    <?= $form->field($model, 'stok_karton') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
