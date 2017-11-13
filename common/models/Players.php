<?php

namespace common\models;

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
            [['date'], 'safe'],
            [['name', 'photo'], 'string', 'max' => 255],
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
            'in_team' => 'In Team',
            'goals' => 'Goals',
            'passes' => 'Passes',
            'name' => 'Name',
            'date' => 'Date',
            'captain' => 'Captain',
            'best_player_count' => 'Best Player Count',
            'photo' => 'Photo',
        ];
    }
}
