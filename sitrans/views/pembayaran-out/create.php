<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PembayaranOut */

$this->title = Yii::t('app', 'Create Pembayaran Out');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembayaran Outs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-out-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
