<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Poruke;

/**
 * PorukeSearch represents the model behind the search form of `backend\models\Poruke`.
 */
class PorukeSearch extends Poruke
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_poruke', 'id_roditelj', 'id_ucitelj'], 'integer'],
            [['poruka', 'vreme'], 'safe'],
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
        $query = Poruke::find();

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
            'id_poruke' => $this->id_poruke,
            'vreme' => $this->vreme,
            'id_roditelj' => $this->id_roditelj,
            'id_ucitelj' => $this->id_ucitelj,
        ]);

        $query->andFilterWhere(['like', 'poruka', $this->poruka]);

        return $dataProvider;
    }
}
