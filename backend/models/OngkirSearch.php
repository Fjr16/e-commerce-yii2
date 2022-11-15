<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ongkir;

/**
 * OngkirSearch represents the model behind the search form of `backend\models\Ongkir`.
 */
class OngkirSearch extends Ongkir
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ongkir', 'total_ongkir'], 'integer'],
            [['Provinsi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ongkir::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            // 'id_ongkir' => $this->id_ongkir,
            'total_ongkir' => $this->total_ongkir,
        ]);

        $query->andFilterWhere(['like', 'Provinsi', $this->Provinsi]);

        return $dataProvider;
    }
}
