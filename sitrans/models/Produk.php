<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property integer $idmerk
 * @property integer $idjenis
 * @property string $lokasi
 * @property string $namaproduk
 * @property integer $harga_beli
 * @property integer $harga_jual
 * @property string $kilo
 * @property string $karton
 *
 * @property Pembelian[] $pembelians
 * @property Penjualan[] $penjualans
 * @property Jenis $idjenis0
 * @property Merk $idmerk0
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmerk', 'idjenis', 'lokasi'], 'required'],
            [['idmerk', 'idjenis', 'harga_beli', 'harga_jual'], 'integer'],
            [['kilo', 'karton'], 'number'],
            [['lokasi'], 'string', 'max' => 25],
            [['namaproduk'], 'string', 'max' => 50],
            [['namaproduk'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmerk' => Yii::t('app', 'Idmerk'),
            'idjenis' => Yii::t('app', 'Idjenis'),
            'lokasi' => Yii::t('app', 'Lokasi'),
            'namaproduk' => Yii::t('app', 'Namaproduk'),
            'harga_beli' => Yii::t('app', 'Harga Beli'),
            'harga_jual' => Yii::t('app', 'Harga Jual'),
            'kilo' => Yii::t('app', 'Kilo'),
            'karton' => Yii::t('app', 'Karton'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['produk' => 'namaproduk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['produk' => 'namaproduk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdjenis0()
    {
        return $this->hasOne(Jenis::className(), ['idjenis' => 'idjenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmerk0()
    {
        return $this->hasOne(Merk::className(), ['idmerk' => 'idmerk']);
    }
}
