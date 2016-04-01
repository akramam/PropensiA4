<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coba".
 *
 * @property integer $nomor
 */
class Coba extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coba';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor'], 'required'],
            [['nomor'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => Yii::t('app', 'Nomor'),
        ];
    }
}
