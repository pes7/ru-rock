<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Track;

/**
 * TrackSearch represents the model behind the search form of `app\models\Track`.
 */
class TrackSearch extends Track
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idAlbom'], 'integer'],
            [['lable', 'url'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Track::find();

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
            'id' => $this->id,
            'idAlbom' => $this->idAlbom,
        ]);

        $query->andFilterWhere(['like', 'lable', $this->lable])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
