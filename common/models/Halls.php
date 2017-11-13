<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "halls".
 *
 * @property integer $id
 * @property integer $level
 * @property string $on_map
 * @property string $gate_width
 * @property string $gate_height
 * @property string $address
 * @property string $length
 * @property string $width
 * @property string $total_matches
 * @property string $description
 */
class Halls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'halls';
    }

    public $imageFiles;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'integer'],
            [['on_map' ,'gate_width', 'gate_height', 'address', 'length', 'width', 'total_matches', 'description'], 'string', 'max' => 255],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
            'on_map' => 'On Map',
            'gate_width' => 'Gate Width',
            'gate_height' => 'Gate Height',
            'address' => 'Address',
            'length' => 'Length',
            'width' => 'Width',
            'total_matches' => 'Total Matches',
            'description' => 'Description',
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs(Yii::getAlias('@backend/web/images/halls/') . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
