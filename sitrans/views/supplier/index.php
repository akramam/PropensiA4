<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Supplier');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Supplier'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idsupplier',
            'namasupplier',
            'telponsupplier',
            'alamatsupplier',
            'no_rekening',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
