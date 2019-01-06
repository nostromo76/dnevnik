<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Odeljenje;

/**
 * OdeljenjeSearch represents the model behind the search form of `backend\models\Odeljenje`.
 */
class OdeljenjeSearch extends Odeljenje
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_odeljenje', 'id_ucitelj'], 'integer'],
            [['naziv'], 'safe'],
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
        $query = Odeljenje::find();

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
            'id_odeljenje' => $this->id_odeljenje,
            'id_ucitelj' => $this->id_ucitelj,
        ]);

        $query->andFilterWhere(['like', 'naziv', $this->naziv]);

        return $dataProvider;
    }
}
