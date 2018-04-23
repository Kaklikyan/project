<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeamInformation;

/**
 * TeamInformationSearch represents the model behind the search form about `backend\models\TeamInformation`.
 */
class TeamInformationSearch extends TeamInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'games_count', 'number_of_wins', 'number_of_looses', 'number_of_players', 'team_id'], 'integer'],
            [['last_game_link'], 'safe'],
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
        $query = TeamInformation::find();

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
            'team_id' => $this->team_id,
            'games_count' => $this->games_count,
            'number_of_wins' => $this->number_of_wins,
            'number_of_looses' => $this->number_of_looses,
            'number_of_players' => $this->number_of_players,
        ]);

        $query->andFilterWhere(['like', 'last_game_link', $this->last_game_link]);

        return $dataProvider;
    }
}
