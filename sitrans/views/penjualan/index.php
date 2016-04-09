<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenjualanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Penjualan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-index">
 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Penjualan'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjual',
            'idbayar',
            'produk',
            'tgl_jual',
            'tgl_kirim',
            // 'jatuh_tempo',
            // 'jam_kirim',
            // 'cara_kirim',
            // 'cara_bayar',
            // 'status_del',
            // 'harga_total',
            // 'karton',
            // 'kilo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
