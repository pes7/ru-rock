<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Albom;

/**
 * AlbomSearch represents the model behind the search form of `app\models\Albom`.
 */
class AlbomSearch extends Albom
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bandId'], 'integer'],
            [['lable', 'image', 'albomTag', 'date'], 'safe'],
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
        $query = Albom::find();

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
            'bandId' => $this->bandId,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'lable', $this->lable])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
