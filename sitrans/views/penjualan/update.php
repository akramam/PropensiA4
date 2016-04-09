<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Penjualan',
]) . ' ' . $model->idjual;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penjualans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjual, 'url' => ['view', 'id' => $model->idjual]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="penjualan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
