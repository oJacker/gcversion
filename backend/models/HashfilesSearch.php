<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hashfiles;

/**
 * HashfilesSearch represents the model behind the search form about `backend\models\Hashfiles`.
 */
class HashfilesSearch extends Hashfiles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hashfile_id', 'hashfile_project_id'], 'integer'],
            [['hashfile_oldhash', 'hashfile_newhash','hashfile_version', 'hashfile_usestatus', 'hashfile_date'], 'safe'],
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
        $query = Hashfiles::find();

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
            'hashfile_id' => $this->hashfile_id,
            'hashfile_project_id' => $this->hashfile_project_id,
            'hashfile_date' => $this->hashfile_date,
        ]);

        $query->andFilterWhere(['like', 'hashfile_oldhash', $this->hashfile_oldhash])
            ->andFilterWhere(['like', 'hashfile_newhash', $this->hashfile_newhash])
            ->andFilterWhere(['like', 'hashfile_version', $this->hashfile_version])
            ->andFilterWhere(['like', 'hashfile_usestatus', $this->hashfile_usestatus]);

        return $dataProvider;
    }
}
