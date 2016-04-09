<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pembelian */

$this->title = 'Create Pembelian';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
