<?php

namespace frontend\modules\roditelj\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\roditelj\models\OtvorenaVrata;

/**
 * OtvorenaVrataSearch represents the model behind the search form of `frontend\modules\roditelj\models\OtvorenaVrata`.
 */
class OtvorenaVrataSearch extends OtvorenaVrata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_otvorena_vrata', 'id_ucitelj', 'id_roditelj'], 'integer'],
            [['naslov', 'otvorena_vrata', 'vreme'], 'safe'],
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
        $query = OtvorenaVrata::find();

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
            'id_otvorena_vrata' => $this->id_otvorena_vrata,
            'vreme' => $this->vreme,
            'id_ucitelj' => $this->id_ucitelj,
            'id_roditelj' => $this->id_roditelj,
        ]);

        $query->andFilterWhere(['like', 'naslov', $this->naslov])
            ->andFilterWhere(['like', 'otvorena_vrata', $this->otvorena_vrata]);

        return $dataProvider;
    }
}
