<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Barang Akan Masuk';
$this->params['breadcrumbs'][] = $this->title;

        $myHost = "localhost";
            $myUser = "postgres";
            $myPassword = "1234";
            $myPort = "5432";
            // Create connection
            $conn = "host = ".$myHost." user = ".$myUser." password = ".$myPassword." port = ".$myPort." dbname = sitrans";
            // Check connection
            if (!$database = pg_connect($conn)) {
                die("Connection failed");
            }
$ambilTabel = "SELECT * FROM PEMBELIAN P, PEMBAYARAN_OUT B, SUPPLIER S WHERE P.idbayar=B.idbayar AND S.namasupplier = B.supplier AND P.status_del='Belum Diterima';";
        $ngambil = pg_query($ambilTabel);
        

?>
<div class="pembelian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= 
        //$command = $connection->createCommand("'SELECT * FROM PEMBELIAN P, PEMBAYARAN_OUT B, SUPPLIER S WHERE P.idbayar=B.idbayar AND S.namasupplier = B.supplier AND P.status_del='Belum Diterima';'");
        //$reader = $command->query();

        

        //while ($row = $ngambil->read()) {
        //    $rows[] = $row;
        //}

        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'idbeli',
                //'idbayar',
                'produk',
                //'supplier',
                'tgl_beli',
                'tgl_terima',
                'cara_terima',
                'cara_bayar',
                'status_del',
                'harga_total',
                'karton',
                'kilo',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

</div>
