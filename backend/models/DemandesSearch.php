<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Demandes;

/**
 * DemandesSearch represents the model behind the search form about `backend\models\Demandes`.
 */
class DemandesSearch extends Demandes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['demand_id'], 'integer'],
            [['demand_name', 'demand_status', 'demand_leading', 'demand_created_date', 'demand_update_date', 'demand_begin_date', 'demand_end_date', 'demand_remarks'], 'safe'],
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
        $query = Demandes::find();

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
            'demand_id' => $this->demand_id,
            'demand_created_date' => $this->demand_created_date,
            'demand_update_date' => $this->demand_update_date,
            'demand_begin_date' => $this->demand_begin_date,
            'demand_end_date' => $this->demand_end_date,
        ]);

        $query->andFilterWhere(['like', 'demand_name', $this->demand_name])
            ->andFilterWhere(['like', 'demand_status', $this->demand_status])
            ->andFilterWhere(['like', 'demand_leading', $this->demand_leading])
            ->andFilterWhere(['like', 'demand_remarks', $this->demand_remarks]);

        return $dataProvider;
    }
}
