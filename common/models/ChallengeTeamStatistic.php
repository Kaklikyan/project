<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "challenge_team_statistic".
 *
 * @property integer $id
 * @property integer $challenge_id
 * @property string $who
 * @property string $whom
 * @property string $decision
 * @property string $decision_date
 */
class ChallengeTeamStatistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'challenge_team_statistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['challenge_id'], 'integer'],
            [['decision_date'], 'safe'],
            [['who', 'whom', 'decision'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'challenge_id' => 'Challenge ID',
            'who' => 'Who',
            'whom' => 'Whom',
            'decision' => 'Decision',
            'decision_date' => 'Decision Date',
        ];
    }
}
