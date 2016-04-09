<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Produk');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Produk'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Print'), ['print'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idmerk',
            //'idsupplier',
            //'idjenis',
            'namaproduk',
            'harga_beli',
            'harga_jual',
            'kilo',
            'karton',
            'lokasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
