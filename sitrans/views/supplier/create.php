<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = Yii::t('app', 'Create Supplier');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Supplier'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
