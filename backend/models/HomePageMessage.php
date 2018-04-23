<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "home_page_messages".
 *
 * @property integer $id
 * @property string $Sender
 * @property string $SenderEmail
 * @property string $Message
 */
class HomePageMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home_page_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Sender', 'SenderEmail', 'Message'], 'required'],
            [['Message'], 'string'],
            ['SenderEmail', 'email'],
            [['Sender'], 'string', 'max' => 255, 'message' => " is not a valid email."],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Sender' => 'Sender',
            'SenderEmail' => 'Sender Email',
            'Message' => 'Message',
        ];
    }
}
