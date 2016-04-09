<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */

$this->title = Yii::t('app', 'Create Penjualan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penjualan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
