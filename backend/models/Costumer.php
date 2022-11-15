<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "costumer".
 *
 * @property int $id_costumer
 * @property int|null $id_user
 * @property string|null $nama
 * @property string|null $telp
 * @property string|null $alamat
 *
 * @property User $user
 */
class Costumer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'costumer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'telp'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_costumer' => 'Id Costumer',
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'telp' => 'Telp',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
