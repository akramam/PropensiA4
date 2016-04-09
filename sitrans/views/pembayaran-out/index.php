<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pembayaran Outs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-out-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idbayar',
            'supplier',
            'tgl_trans',
            'tgl_bayar',
            'jumlahbayar',
            // 'status_bayar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
