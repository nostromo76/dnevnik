<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Raspored;

/**
 * RasporedSearch represents the model behind the search form of `backend\models\Raspored`.
 */
class RasporedSearch extends Raspored
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_predmet', 'id_odeljenje'], 'integer'],
            [['dan', 'br_casa'], 'safe'],
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
        $query = Raspored::find();

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
            'id' => $this->id,
            'id_predmet' => $this->id_predmet,
            'id_odeljenje' => $this->id_odeljenje,
        ]);

        $query->andFilterWhere(['like', 'dan', $this->dan])
            ->andFilterWhere(['like', 'br_casa', $this->br_casa]);

        return $dataProvider;
    }
}
