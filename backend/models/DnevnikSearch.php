<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Dnevnik;

/**
 * DnevnikSearch represents the model behind the search form of `backend\models\Dnevnik`.
 */
class DnevnikSearch extends Dnevnik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dnevnik', 'id_ucenik', 'id_ucitelj', 'id_roditelj', 'id_odeljenje', 'id_ocena'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Dnevnik::find();

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
            'id_dnevnik' => $this->id_dnevnik,
            'id_ucenik' => $this->id_ucenik,
            'id_ucitelj' => $this->id_ucitelj,
            'id_roditelj' => $this->id_roditelj,
            'id_odeljenje' => $this->id_odeljenje,
            'id_ocena' => $this->id_ocena,
        ]);

        return $dataProvider;
    }
}
