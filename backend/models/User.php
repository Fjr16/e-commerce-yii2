<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int|null $admin
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string $level
 *
 * @property CartItems[] $cartItems
 * @property Costumer[] $costumers
 * @property Karyawan[] $karyawans
 * @property Orders[] $orders
 * @property Owner[] $owners
 * @property Products[] $products
 * @property Products[] $products0
 * @property UserAddresses[] $userAddresses
 * @property Pengguna $pengguna
 */
class User extends \yii\db\ActiveRecord
{
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level'], 'safe'],
            [['password'], 'safe'],
            [['peran'], 'safe'],
            [['firstname', 'lastname', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'admin', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'lastname', 'username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'admin' => 'Admin',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CartItems]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getPengguna()
    {
        return $this->hasOne(Pengguna::className(), ['id' => 'id']);
    }

    public function getPeran0()
    {
        if ($this->peran == 0) {
            return 'Admin';
        } else if ($this->peran == 1) {
            return 'Owner';
        } else if ($this->peran == 2) {
            return 'Karyawan';
        } else if ($this->peran == 3) {
            return 'Costumer';
        }
    }
    // public function getCartItems()
    // {
    //     return $this->hasMany(CartItems::className(), ['created_by' => 'id']);
    // }

    // /**
    //  * Gets query for [[Costumers]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getCostumers()
    // {
    //     return $this->hasMany(Costumer::className(), ['id_user' => 'id']);
    // }

    // /**
    //  * Gets query for [[Karyawans]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getKaryawans()
    // {
    //     return $this->hasMany(Karyawan::className(), ['id_user' => 'id']);
    // }

    // /**
    //  * Gets query for [[Orders]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getOrders()
    // {
    //     return $this->hasMany(Orders::className(), ['created_by' => 'id']);
    // }

    // /**
    //  * Gets query for [[Owners]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getOwners()
    // {
    //     return $this->hasMany(Owner::className(), ['id_user' => 'id']);
    // }

    // /**
    //  * Gets query for [[Products]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getProducts()
    // {
    //     return $this->hasMany(Products::className(), ['created_by' => 'id']);
    // }

    // /**
    //  * Gets query for [[Products0]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getProducts0()
    // {
    //     return $this->hasMany(Products::className(), ['updated_by' => 'id']);
    // }

    // /**
    //  * Gets query for [[UserAddresses]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getUserAddresses()
    // {
    //     return $this->hasMany(UserAddresses::className(), ['user_id' => 'id']);
    // }
}
