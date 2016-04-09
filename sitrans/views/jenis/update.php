<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jenis */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jenis',
]) . ' ' . $model->idjenis;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjenis, 'url' => ['view', 'id' => $model->idjenis]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jenis-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
