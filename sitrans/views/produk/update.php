<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Produk',
]) . ' ' . $model->idmerk;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmerk, 'url' => ['view', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier, 'idjenis' => $model->idjenis, 'lokasi' => $model->lokasi]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="produk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
