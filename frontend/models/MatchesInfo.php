<?php

namespace frontend\models;

use common\models\MatchesInfoStatistic;
use Yii;

/**
 * This is the model class for table "matches_info".
 *
 * @property integer $id
 * @property integer $team_info_id
 * @property integer $first_side
 * @property integer $second_side
 * @property string $match_score
 * @property integer $match_winner
 * @property string $match_date
 */
class MatchesInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matches_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_info_id'], 'required'],
            [['team_info_id', 'first_side', 'second_side', 'match_winner'], 'integer'],
            [['match_date'], 'safe'],
            [['match_score'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_info_id' => 'Team Info ID',
            'first_side' => 'First Side',
            'second_side' => 'Second Side',
            'match_score' => 'Match Score',
            'match_winner' => 'Match Winner',
            'match_date' => 'Match Date',
        ];
    }

    public function getFirst() {
        return $this->hasOne(Teams::className(), ['id' => 'first_side']);
    }

    public function getSecond() {
        return $this->hasOne(Teams::className(), ['id' => 'second_side']);
    }

    public function getMatchInfoStatistics() {
        return $this->hasMany(MatchesInfoStatistic::className(), ['match_info_id' => 'id']);
    }

    /*public function getStatistic() {
        return $this->hasMany(MatchesInfoStatistic::className(), ['match_info_id' => 'id']);
    }*/
}
