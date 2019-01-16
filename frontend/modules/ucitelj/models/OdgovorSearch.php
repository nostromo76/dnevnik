<?php

namespace frontend\modules\ucitelj\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\ucitelj\models\Odgovor;

/**
 * OdgovorSearch represents the model behind the search form of `frontend\modules\ucitelj\models\Odgovor`.
 */
class OdgovorSearch extends Odgovor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['odgovor_id', 'id_roditelj', 'id_ucitelj'], 'integer'],
            [['da', 'ne', 'vreme'], 'safe'],
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
        $query = Odgovor::find();

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
            'odgovor_id' => $this->odgovor_id,
            'id_roditelj' => $this->id_roditelj,
            'id_ucitelj' => $this->id_ucitelj,
            'vreme' => $this->vreme,
        ]);

        $query->andFilterWhere(['like', 'da', $this->da])
            ->andFilterWhere(['like', 'ne', $this->ne]);

        return $dataProvider;
    }
}
