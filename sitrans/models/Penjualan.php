<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property integer $idjual
 * @property integer $idbayar
 * @property string $produk
 * @property string $tgl_jual
 * @property string $tgl_kirim
 * @property string $jatuh_tempo
 * @property string $jam_kirim
 * @property string $cara_kirim
 * @property string $cara_bayar
 * @property string $status_del
 * @property string $harga_total
 * @property string $karton
 * @property string $kilo
 *
 * @property PembayaranIn $idbayar0
 * @property Produk $produk0
 */
class Penjualan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjual'], 'required'],
            [['idjual', 'idbayar'], 'integer'],
            [['tgl_jual', 'tgl_kirim', 'jatuh_tempo', 'jam_kirim'], 'safe'],
            [['harga_total', 'karton', 'kilo'], 'number'],
            [['produk'], 'string', 'max' => 50],
            [['cara_kirim', 'cara_bayar', 'status_del'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjual' => Yii::t('app', 'Idjual'),
            'idbayar' => Yii::t('app', 'Idbayar'),
            'produk' => Yii::t('app', 'Produk'),
            'tgl_jual' => Yii::t('app', 'Tgl Jual'),
            'tgl_kirim' => Yii::t('app', 'Tgl Kirim'),
            'jatuh_tempo' => Yii::t('app', 'Jatuh Tempo'),
            'jam_kirim' => Yii::t('app', 'Jam Kirim'),
            'cara_kirim' => Yii::t('app', 'Cara Kirim'),
            'cara_bayar' => Yii::t('app', 'Cara Bayar'),
            'status_del' => Yii::t('app', 'Status Del'),
            'harga_total' => Yii::t('app', 'Harga Total'),
            'karton' => Yii::t('app', 'Karton'),
            'kilo' => Yii::t('app', 'Kilo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdbayar0()
    {
        return $this->hasOne(PembayaranIn::className(), ['idbayar' => 'idbayar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk0()
    {
        return $this->hasOne(Produk::className(), ['namaproduk' => 'produk']);
    }
}
