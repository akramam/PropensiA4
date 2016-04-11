<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Produk',
]) . ' ' . $model->idmerk;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produk'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmerk, 'url' => ['view', 'idmerk' => $model->idmerk, 'idjenis' => $model->idjenis, 'lokasi' => $model->lokasi]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="produk-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
