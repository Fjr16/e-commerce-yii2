<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ongkir".
 *
 * @property int $id_ongkir
 * @property string $Provinsi
 * @property int $total_ongkir
 */
class Ongkir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ongkir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Provinsi', 'total_ongkir'], 'required'],
            [['total_ongkir'], 'integer'],
            [['Provinsi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id_ongkir' => 'Id Ongkir',
            'Provinsi' => 'Provinsi',
            'total_ongkir' => 'Total Ongkir',
        ];
    }
}
