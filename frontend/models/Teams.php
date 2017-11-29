<?php

namespace frontend\models;

use common\models\MatchesInfoStatistic;
use common\models\TeamInformation;
use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "teams".
 *
 * @property integer $id
 * @property integer $creator
 * @property string $title
 * @property string $logo
 * @property integer $challenge
 */
class Teams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $imageFile;


    public static function tableName()
    {
        return 'teams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'logo'], 'required'],
            [['creator', 'challenge'], 'integer'],
            [['title', 'logo'], 'string', 'max' => 255],
            [['title'], 'unique', 'message'=>'This name already exists'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'creator' => 'Creator',
            'title' => 'Title',
            'logo' => 'Logo',
            'challenge' => 'Challenge',
            'information.number_of_wins' => 'Wins',
            'information.games_count' => 'Matches',
            'information.number_of_looses' => 'Looses',
            'information.number_of_players' => 'Players'
        ];
    }

    public function getPlayers(){
        return $this->hasMany(TeamPlayers::className(), ['team_id' => 'id']);
    }

    public function getInformation(){
        return $this->hasOne(TeamInformation::className(), ['team_id' => 'id']);
    }
}
