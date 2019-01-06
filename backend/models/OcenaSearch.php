<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ocena;

/**
 * OcenaSearch represents the model behind the search form of `backend\models\Ocena`.
 */
class OcenaSearch extends Ocena
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ocena', 'vrednost_ocena', 'zakljucena_ocena', 'id_ucenik', 'id_predmet'], 'integer'],
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
        $query = Ocena::find();

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
            'id_ocena' => $this->id_ocena,
            'vrednost_ocena' => $this->vrednost_ocena,
            'zakljucena_ocena' => $this->zakljucena_ocena,
            'id_ucenik' => $this->id_ucenik,
            'id_predmet' => $this->id_predmet,
        ]);

        return $dataProvider;
    }
}
