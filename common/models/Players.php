<?php

namespace common\models;

use frontend\models\Teams;
use Yii;

/**
 * This is the model class for table "players".
 *
 * @property integer $id
 * @property integer $is_user
 * @property integer $in_team
 * @property integer $goals
 * @property integer $passes
 * @property string $name
 * @property string $date
 * @property integer $captain
 * @property integer $best_player_count
 * @property string $photo
 */
class Players extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'players';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_user', 'in_team', 'goals', 'passes', 'captain', 'best_player_count'], 'integer'],
            [['date', 'invite_date'], 'safe'],
            [['name', 'photo', 'invite-request'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_user' => 'Is User',
            'in_team' => 'Team',
            'goals' => 'Goals',
            'passes' => 'Passes',
            'name' => 'Name',
            'date' => 'Age',
            'invite_date' => 'Invite Date',
            'captain' => 'Captain',
            'best_player_count' => 'Best Player Count',
            'photo' => 'Photo',
        ];
    }

    public function getTeam() {
        return $this->hasOne(Teams::className(), ['id' => 'in_team']);
    }
}
