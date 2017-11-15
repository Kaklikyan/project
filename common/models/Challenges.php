<?php

namespace common\models;

use frontend\models\Teams;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "challenges".
 *
 * @property integer $id
 * @property integer $from
 * @property integer $to
 * @property string $date
 * @property string $challenge_date
 * @property string $duration
 * @property integer $referee
 * @property integer $vest
 * @property integer $previous_match_id
 * @property string $challenge_key
 * @property integer $status
 */
class Challenges extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'challenges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to', 'referee', 'vest', 'previous_match_id', 'status'], 'integer'],
            [['date', 'challenge_date'], 'safe'],
            [['duration', 'challenge_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'date' => 'Date',
            'duration' => 'Duration',
            'referee' => 'Referee',
            'vest' => 'Vest',
            'previous_match_id' => 'Previous Match ID',
        ];
    }

    public function getChallengeFrom() {
        return $this->hasOne(Teams::className(), ['id' => 'from']);
    }

    public function getChallengeTo() {
        return $this->hasOne(Teams::className(), ['id' => 'to']);
    }
}
