<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Merk */

$this->title = $model->idmerk;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Merks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idmerk',
            'idsupplier',
            'namasupplier',
            'status',
        ],
    ]) ?>

</div>
