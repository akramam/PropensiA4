<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $idsupplier
 * @property string $namasupplier
 * @property string $telponsupplier
 * @property string $alamatsupplier
 * @property string $no_rekening
 *
 * @property Merk[] $merks
 * @property PembayaranOut[] $pembayaranOuts
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsupplier'], 'required'],
            [['idsupplier'], 'integer'],
            [['namasupplier', 'telponsupplier', 'no_rekening'], 'string', 'max' => 50],
            [['alamatsupplier'], 'string', 'max' => 100],
            [['namasupplier'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsupplier' => Yii::t('app', 'ID'),
            'namasupplier' => Yii::t('app', 'Nama'),
            'telponsupplier' => Yii::t('app', 'Nomor Telepon'),
            'alamatsupplier' => Yii::t('app', 'Alamat'),
            'no_rekening' => Yii::t('app', 'No. Rekening'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerks()
    {
        return $this->hasMany(Merk::className(), ['idsupplier' => 'idsupplier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayaranOuts()
    {
        return $this->hasMany(PembayaranOut::className(), ['supplier' => 'namasupplier']);
    }
}
