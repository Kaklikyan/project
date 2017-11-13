<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "matches_info_statistic".
 *
 * @property integer $id
 * @property integer $match_info_id
 * @property integer $first_side_scored
 * @property integer $first_side_passed
 * @property integer $second_side_scored
 * @property integer $second_side_passed
 */
class MatchesInfoStatistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matches_info_statistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['match_info_id', 'goal', 'pass'], 'integer'],
            [['side'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'match_info_id' => 'Match Info ID',
            'side' => 'Side',
            'goal' => 'Goal',
            'pass' => 'Pass',
        ];
    }

    public function getGoal() {
        return $this->hasOne(Players::className(), ['id' => 'goal']);
    }

    public function getPass() {
        return $this->hasOne(Players::className(), ['id' => 'pass']);
    }
}
