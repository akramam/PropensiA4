<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pembelian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'idbeli')->textInput(['readonly'=>!$model->isNewRecord]) ?>

    <?= $form->field($model, 'idbayar')->textInput(['readonly'=>!$model->isNewRecord]) ?>

    <?= $form->field($model, 'produk')->textInput(['readonly'=>!$model->isNewRecord]) ?>

    <?= $form->field($model, 'tgl_beli')->textInput(['readonly'=>!$model->isNewRecord]) ?>

    <?= $form->field($model, 'tgl_terima')->textInput() ?>

    <?= $form->field($model, 'cara_terima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cara_bayar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_del')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_total')->textInput(['readonly'=>!$model->isNewRecord]) ?>

    <?= $form->field($model, 'karton')->textInput(['readonly'=>!$model->isNewRecord]) ?>

    <?= $form->field($model, 'kilo')->textInput(['readonly'=>!$model->isNewRecord]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
