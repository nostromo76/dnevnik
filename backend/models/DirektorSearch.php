<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Direktor;

/**
 * DirektorSearch represents the model behind the search form of `backend\models\Direktor`.
 */
class DirektorSearch extends Direktor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_direktor', 'prosek_odeljenje', 'prosek_skola', 'id_user'], 'integer'],
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
        $query = Direktor::find();

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
            'id_direktor' => $this->id_direktor,
            'prosek_odeljenje' => $this->prosek_odeljenje,
            'prosek_skola' => $this->prosek_skola,
            'id_user' => $this->id_user,
        ]);

        return $dataProvider;
    }
}
