<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Merk;
use app\models\Jenis;
use app\models\Supplier;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idmerk')->dropDownList(
        ArrayHelper::map(Merk::find()->all(),'idmerk','namasupplier'),
        ['prompt'=>'Select Merk']
    ) ?>

    <?= $form->field($model, 'idjenis')->dropDownList(
        ArrayHelper::map(Jenis::find()->all(),'idjenis','namajenis'),
        ['prompt'=>'Select Jenis']
    ) ?>

    <?= $form->field($model, 'lokasi')->dropDownList(
        array('Bekasi'=>'Bekasi','Cakung'=>'Cakung'),
        ['prompt' => 'Select Lokasi']
        )
     ?> 

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
