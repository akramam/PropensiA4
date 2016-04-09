<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pembelian */

$this->title = 'Update Pembelian: ' . ' ' . $model->idbeli;
$this->params['breadcrumbs'][] = ['label' => 'Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbeli, 'url' => ['view', 'id' => $model->idbeli]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembelian-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
