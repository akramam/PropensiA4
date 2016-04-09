<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranOut */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pembayaran Out',
]) . ' ' . $model->idbayar;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembayaran Outs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbayar, 'url' => ['view', 'id' => $model->idbayar]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pembayaran-out-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
