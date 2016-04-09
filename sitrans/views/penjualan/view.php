<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */

$this->title = $model->idjual;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penjualan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idjual], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idjual], [
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
            'idjual',
            'idbayar',
            'produk',
            'tgl_jual',
            'tgl_kirim',
            'jatuh_tempo',
            'jam_kirim',
            'cara_kirim',
            'cara_bayar',
            'status_del',
            'harga_total',
            'karton',
            'kilo',
        ],
    ]) ?>

</div>
