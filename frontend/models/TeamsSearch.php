<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 29/11/17
 * Time: 13:47
 */

namespace frontend\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class TeamsSearch extends Teams
{
    public function rules()
    {
        return [
//            [['title', 'logo'], 'required'],
            [['creator', 'challenge'], 'integer'],
            [['title', 'logo'], 'string', 'max' => 255],
            [['title'], 'unique', 'message'=>'This name already exists'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
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

    public function search($params)
    {
        $query = Teams::find();

        // add conditions that should always apply here

        $query->joinWith(['information' => function($query) { $query->from(['information' => 'teams_information']); }]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $dataProvider->sort->attributes['information.number_of_wins'] = [
            'asc' => ['information.number_of_wins' => SORT_ASC],
            'desc' => ['information.number_of_wins' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['information.number_of_looses'] = [
            'asc' => ['information.number_of_looses' => SORT_ASC],
            'desc' => ['information.number_of_looses' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['information.games_count'] = [
            'asc' => ['information.games_count' => SORT_ASC],
            'desc' => ['information.games_count' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['information.number_of_players'] = [
            'asc' => ['information.number_of_players' => SORT_ASC],
            'desc' => ['information.number_of_players' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'creator', $this->creator])
            ->andFilterWhere(['like', 'challenge', $this->challenge])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['LIKE', 'information.number_of_wins', $this->getAttribute('information.number_of_wins')]);

        return $dataProvider;
    }

}