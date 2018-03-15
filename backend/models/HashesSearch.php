<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hashes;

/**
 * HashesSearch represents the model behind the search form about `backend\models\Hashes`.
 */
class HashesSearch extends Hashes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash_id', 'hash_source', 'hash_source_branch', 'hash_committer_name', 'has_committer_email', 'has_committer_date'], 'safe'],
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
        $query = Hashes::find();

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
            'has_committer_date' => $this->has_committer_date,
        ]);

        $query->andFilterWhere(['like', 'hash_id', $this->hash_id])
            ->andFilterWhere(['like', 'hash_source', $this->hash_source])
            ->andFilterWhere(['like', 'hash_source_branch', $this->hash_source_branch])
            ->andFilterWhere(['like', 'hash_committer_name', $this->hash_committer_name])
            ->andFilterWhere(['like', 'has_committer_email', $this->has_committer_email]);

        return $dataProvider;
    }
}
