<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembelian".
 *
 * @property integer $idbeli
 * @property integer $idbayar
 * @property string $produk
 * @property string $tgl_beli
 * @property string $tgl_terima
 * @property string $cara_terima
 * @property string $cara_bayar
 * @property string $status_del
 * @property string $harga_total
 * @property string $karton
 * @property string $kilo
 *
 * @property PembayaranOut $idbayar0
 * @property Produk $produk0
 */
class Pembelian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembelian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbeli'], 'required'],
            [['idbeli', 'idbayar'], 'integer'],
            [['tgl_beli', 'tgl_terima'], 'safe'],
            [['harga_total', 'karton', 'kilo'], 'number'],
            [['produk'], 'string', 'max' => 50],
            [['cara_terima', 'cara_bayar', 'status_del'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbeli' => 'Idbeli',
            'idbayar' => 'Idbayar',
            'produk' => 'Produk',
            'tgl_beli' => 'Tgl Beli',
            'tgl_terima' => 'Tgl Terima',
            'cara_terima' => 'Cara Terima',
            'cara_bayar' => 'Cara Bayar',
            'status_del' => 'Status Del',
            'harga_total' => 'Harga Total',
            'karton' => 'Karton',
            'kilo' => 'Kilo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdbayar0()
    {
        return $this->hasOne(PembayaranOut::className(), ['idbayar' => 'idbayar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk0()
    {
        return $this->hasOne(Produk::className(), ['namaproduk' => 'produk']);
    }
}
