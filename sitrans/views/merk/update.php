<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Merk */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Merk',
]) . ' ' . $model->idmerk;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Merk'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmerk, 'url' => ['view', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="merk-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
