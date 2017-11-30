<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Players;

/**
 * PlayersSearch represents the model behind the search form about `common\models\Players`.
 */
class PlayersSearch extends Players
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_user', 'in_team', 'goals', 'passes', 'captain', 'best_player_count'], 'integer'],
            [['name', 'date', 'photo'], 'safe'],
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
        $query = Players::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
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
            'is_user' => $this->is_user,
            'in_team' => $this->in_team,
            'goals' => $this->goals,
            'passes' => $this->passes,
            'date' => $this->date,
            'captain' => $this->captain,
            'best_player_count' => $this->best_player_count,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
