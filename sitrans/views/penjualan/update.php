<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Penjualan',
]) . ' ' . $model->idjual;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penjualan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjual, 'url' => ['view', 'id' => $model->idjual]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="penjualan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
