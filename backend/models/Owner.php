<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "owner".
 *
 * @property int $id_owner
 * @property int|null $id_user
 * @property string|null $nama
 * @property string|null $telp
 * @property string|null $alamat
 *
 * @property User $user
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'id_owner' => 'Id Owner',
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
    // public function getUser()
    // {
    //     return $this->hasOne(User::className(), ['id' => 'id_user']);
    // }
}
