<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = $model->idmerk;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produk'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier, 'idjenis' => $model->idjenis, 'lokasi' => $model->lokasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier, 'idjenis' => $model->idjenis, 'lokasi' => $model->lokasi], [
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
            'idjenis',
            'lokasi',
            'namaproduk',
            'harga_beli',
            'harga_jual',
            'kilo',
            'karton',
        ],
    ]) ?>

</div>
