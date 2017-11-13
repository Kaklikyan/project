<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Halls;

/**
 * HallsSearch represents the model behind the search form about `common\models\Halls`.
 */
class HallsSearch extends Halls
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level'], 'integer'],
            [['on_map', 'gate_width', 'gate_height', 'address', 'length', 'width', 'total_matches', 'description'], 'safe'],
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
        $query = Halls::find();

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
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'on_map', $this->on_map])
            ->andFilterWhere(['like', 'gate_width', $this->gate_width])
            ->andFilterWhere(['like', 'gate_height', $this->gate_height])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'width', $this->width])
            ->andFilterWhere(['like', 'total_matches', $this->total_matches])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
