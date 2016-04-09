<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran_out".
 *
 * @property integer $idbayar
 * @property string $supplier
 * @property string $tgl_trans
 * @property string $tgl_bayar
 * @property string $jumlahbayar
 * @property string $status_bayar
 *
 * @property Supplier $supplier0
 * @property Pembelian[] $pembelians
 */
class PembayaranOut extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran_out';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbayar'], 'required'],
            [['idbayar'], 'integer'],
            [['tgl_trans', 'tgl_bayar'], 'safe'],
            [['jumlahbayar'], 'number'],
            [['supplier'], 'string', 'max' => 50],
            [['status_bayar'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbayar' => Yii::t('app', 'Idbayar'),
            'supplier' => Yii::t('app', 'Supplier'),
            'tgl_trans' => Yii::t('app', 'Tgl Trans'),
            'tgl_bayar' => Yii::t('app', 'Tgl Bayar'),
            'jumlahbayar' => Yii::t('app', 'Jumlahbayar'),
            'status_bayar' => Yii::t('app', 'Status Bayar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier0()
    {
        return $this->hasOne(Supplier::className(), ['namasupplier' => 'supplier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['idbayar' => 'idbayar']);
    }
}
