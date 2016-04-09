<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property string $username
 * @property string $nama
 * @property string $password
 * @property string $role
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username', 'password', 'role'], 'string', 'max' => 25],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'nama' => Yii::t('app', 'Nama'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
        ];
    }
}
