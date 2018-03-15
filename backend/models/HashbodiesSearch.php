<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hashbodies;

/**
 * HashbodiesSearch represents the model behind the search form about `backend\models\Hashbodies`.
 */
class HashbodiesSearch extends Hashbodies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hashbody_id', 'hashbody_text'], 'safe'],
            [['hashbody_project_id'], 'integer'],
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
        $query = Hashbodies::find();

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
            'hashbody_project_id' => $this->hashbody_project_id,
        ]);

        $query->andFilterWhere(['like', 'hashbody_id', $this->hashbody_id])
            ->andFilterWhere(['like', 'hashbody_text', $this->hashbody_text]);

        return $dataProvider;
    }
}
