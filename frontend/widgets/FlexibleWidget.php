<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 20/11/17
 * Time: 12:23
 */

namespace frontend\widgets;

class FlexibleWidget extends \yii\base\Widget
{
    public $first_component;
    public $second_component;
    public $third_component;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('flexible', ['first_component' => $this->first_component, 'second_component' => $this->second_component, 'third_component' => $this->third_component]);
    }

}