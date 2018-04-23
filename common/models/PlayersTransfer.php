<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "players_transfer".
 *
 * @property integer $id
 * @property integer $player_id
 * @property integer $invite_from
 * @property integer $request_to
 * @property string $date
 */
class PlayersTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'players_transfer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['player_id', 'invite_from', 'request_to'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'player_id' => 'Player ID',
            'invite_from' => 'Invite From',
            'request_to' => 'Request To',
            'date' => 'Date',
        ];
    }
}
