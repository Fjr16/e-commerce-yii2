<?php 
namespace backend\models;

    use Yii;

class FilterModel extends yii\db\ActiveRecord{

    public $bln;
    public $thn;

    public function rules(){
        return[
            [["bln", "thn"], "required"],
        ];
    }

    public function attributeLabels(){
        return[
            'bln' => 'Bulan',
            'thn' => 'Tahun',
        ];
    }
}