<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis".
 *
 * @property integer $idjenis
 * @property string $namajenis
 * @property integer $rop
 * @property string $stok_kilo
 * @property string $stok_karton
 *
 * @property Produk[] $produks
 */
class Jenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjenis'], 'required'],
            [['idjenis', 'rop'], 'integer'],
            [['stok_kilo', 'stok_karton'], 'number'],
            [['namajenis'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjenis' => Yii::t('app', 'Id'),
            'namajenis' => Yii::t('app', 'Nama Jenis'),
            'rop' => Yii::t('app', 'ROP'),
            'stok_kilo' => Yii::t('app', 'Stok Kilo'),
            'stok_karton' => Yii::t('app', 'Stok Karton'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduks()
    {
        return $this->hasMany(Produk::className(), ['idjenis' => 'idjenis']);
    }
}
