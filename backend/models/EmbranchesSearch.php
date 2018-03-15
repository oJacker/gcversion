<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Embranches;

/**
 * EmbranchesSearch represents the model behind the search form about `backend\models\Embranches`.
 */
class EmbranchesSearch extends Embranches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['embranch_id', 'demandes_demand_id'], 'integer'],
            [['enbranch_projectend', 'embranch_version', 'embranch_developer', 'embranch_created_date', 'embranch_status', 'embranch_description'], 'safe'],
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
        $query = Embranches::find();

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
            'embranch_id' => $this->embranch_id,
            'demandes_demand_id' => $this->demandes_demand_id,
            'embranch_created_date' => $this->embranch_created_date,
        ]);

        $query->andFilterWhere(['like', 'enbranch_projectend', $this->enbranch_projectend])
            ->andFilterWhere(['like', 'embranch_version', $this->embranch_version])
            ->andFilterWhere(['like', 'embranch_developer', $this->embranch_developer])
            ->andFilterWhere(['like', 'embranch_status', $this->embranch_status])
            ->andFilterWhere(['like', 'embranch_description', $this->embranch_description]);

        return $dataProvider;
    }
}
