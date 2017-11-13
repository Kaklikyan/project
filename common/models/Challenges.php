<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "challenges".
 *
 * @property integer $id
 * @property integer $from
 * @property integer $to
 * @property string $date
 * @property string $duration
 * @property integer $referee
 * @property integer $vest
 * @property integer $previous_match_id
 * @property integer $is_actual
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
            [['from', 'to', 'referee', 'vest', 'previous_match_id', 'is_actual'], 'integer'],
            [['date'], 'safe'],
            [['duration'], 'string', 'max' => 255],
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
}
