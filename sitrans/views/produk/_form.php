<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Merk;
use app\models\Jenis;

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

     <?= $form->field($model, 'idsupplier')->dropDownList(
        ArrayHelper::map(Merk::find()->all(),'idsupplier','namasupplier'),
        ['prompt'=>'Select Supplier']
    ) ?>

     <?= $form->field($model, 'idjenis')->dropDownList(
        ArrayHelper::map(Jenis::find()->all(),'idjenis','namajenis'),
        ['prompt'=>'Select Jenis']
    ) ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>
    <php?
            $items = array("VIP" => "VIP", 
                            "Festival A&B" => "Festival A&B", 
                            "Festival C&D" => "Festival C&D", 
                            "Festival F&E" => "Festival F&E", 
                            "WEST VIP" => "WEST VIP", 
                            "Tribune 2" => "Tribune 1",
                            "Tribune 2" => "Tribune 2",
                            "Tribune 3" => "Tribune 3",
                            "Hot Seat" => "Hot Seat"
                            );
            echo $form->dropDownList($model, 'lokasi', $items);
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
