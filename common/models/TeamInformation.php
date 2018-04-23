<?php

namespace common\models;

use frontend\models\MatchesInfo;
use Yii;

/**
 * This is the model class for table "teams_information".
 *
 * @property integer $id
 * @property integer $games_count
 * @property integer $number_of_wins
 * @property integer $number_of_looses
 * @property integer $number_of_players
 * @property string $last_game_link
 */
class TeamInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teams_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['games_count', 'number_of_wins', 'number_of_looses', 'number_of_players', 'team_id'], 'integer'],
            [['last_game_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_id' => 'Team ID',
            'games_count' => 'Games Count',
            'number_of_wins' => 'Number Of Wins',
            'number_of_looses' => 'Number Of Looses',
            'number_of_players' => 'Number Of Players',
            'last_game_link' => 'Last Game Link',
        ];
    }

    public function getMatches(){

        return $this->hasMany(MatchesInfo::className(), ['team_info_id' => 'id']);
    }
}
