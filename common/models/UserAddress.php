<?php

namespace common\models;

use Yii;
use backend\models\Ongkir;

/**
 * This is the model class for table "{{%user_addresses}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string|null $zipcode
 *
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_addresses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'address', 'city', 'country'], 'required'],
            [['user_id', 'provinsi'], 'integer'],
            [['address', 'city', 'country', 'zipcode'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'zipcode' => 'Zipcode',
            'provinsi' => 'Provinsi',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProvinsi()
    {
        return $this->hasMany(Ongkir::class, ['id_ongkir' => 'provinsi']);
    }

    public function getProv(): ?Ongkir
    {
        $prov = $this->provinsi[0] ?? new Ongkir();
        $prov->id_ongkir = $this->provinsi;
        // echo '<pre>';
        // print_r($this->provinsi);
        // die();
        return $prov;
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UserAddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserAddressQuery(get_called_class());
    }
}
