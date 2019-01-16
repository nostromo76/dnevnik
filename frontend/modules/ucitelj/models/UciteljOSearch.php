<?php

namespace frontend\modules\ucitelj\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\ucitelj\models\UciteljO;

/**
 * UciteljOSearch represents the model behind the search form of `frontend\modules\ucitelj\models\UciteljO`.
 */
class UciteljOSearch extends UciteljO
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ovi_id', 'id_roditelj'], 'integer'],
            [['akcija', 'vreme'], 'safe'],
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
        $query = UciteljO::find();

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
            'ovi_id' => $this->ovi_id,
            'id_roditelj' => $this->id_roditelj,
            'vreme' => $this->vreme,
        ]);

        $query->andFilterWhere(['like', 'akcija', $this->akcija]);

        return $dataProvider;
    }
}
