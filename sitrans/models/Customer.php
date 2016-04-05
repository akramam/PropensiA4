<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $idcustomer
 * @property string $namacustomer
 * @property string $telponcustomer
 * @property string $alamatcustomer
 *
 * @property PembayaranIn[] $pembayaranIns
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcustomer'], 'required'],
            [['idcustomer'], 'integer'],
            [['namacustomer', 'telponcustomer', 'alamatcustomer'], 'string', 'max' => 50],
            [['namacustomer'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcustomer' => Yii::t('app', 'Id'),
            'namacustomer' => Yii::t('app', 'Nama'),
            'telponcustomer' => Yii::t('app', 'Nomor Telepon'),
            'alamatcustomer' => Yii::t('app', 'Alamat'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayaranIns()
    {
        return $this->hasMany(PembayaranIn::className(), ['customer' => 'namacustomer']);
    }
}
