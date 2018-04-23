<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "team_players".
 *
 * @property integer $id
 * @property integer $team_id
 * @property string $player_name
 * @property integer $captain
 * @property string $player_date
 *
 * @property Teams $team
 */
class TeamPlayers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team_players';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_id', 'captain'], 'integer'],
            [['player_date'], 'safe'],
            [['player_name', 'is_user'], 'string', 'max' => 255],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teams::className(), 'targetAttribute' => ['team_id' => 'id']],
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
            'player_name' => 'Player Name',
            'captain' => 'Captain',
            'player_date' => 'Player Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Teams::className(), ['id' => 'team_id']);
    }
}
