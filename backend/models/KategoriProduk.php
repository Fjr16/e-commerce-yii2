<?php

namespace backend\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "kategori_produk".
 *
 * @property int $id
 * @property string|null $kategori
 *
 * @property Products[] $products
 */
class KategoriProduk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id_kategori' => 'id']);
    }

    public static function getAllKategori(){
        $kategori = KategoriProduk::find()->all();
        $kategori = ArrayHelper::map($kategori, 'id', 'kategori');
        // echo '<pre>';
        // print_r($kategori);
        // die();
        return $kategori;
    }
}
