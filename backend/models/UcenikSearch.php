<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ucenik;

/**
 * UcenikSearch represents the model behind the search form of `backend\models\Ucenik`.
 */
class UcenikSearch extends Ucenik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ucenik', 'id_odeljenje', 'id_roditelj'], 'integer'],
            [['ime', 'prezime'], 'safe'],
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
        $query = Ucenik::find();

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
            'id_ucenik' => $this->id_ucenik,
            'id_odeljenje' => $this->id_odeljenje,
            'id_roditelj' => $this->id_roditelj,
        ]);

        $query->andFilterWhere(['like', 'ime', $this->ime])
            ->andFilterWhere(['like', 'prezime', $this->prezime]);

        return $dataProvider;
    }
}
