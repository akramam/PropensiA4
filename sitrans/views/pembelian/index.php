<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembelians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pembelian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idbeli',
            'idbayar',
            'produk',
            'tgl_beli',
            'tgl_terima',
            // 'cara_terima',
            // 'cara_bayar',
            // 'status_del',
            // 'harga_total',
            // 'karton',
            // 'kilo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
