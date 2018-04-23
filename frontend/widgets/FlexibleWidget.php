<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 20/11/17
 * Time: 12:23
 */

namespace frontend\widgets;

use yii\base\Widget;

class FlexibleWidget extends Widget
{
    public $challenge_data;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('flexible', ['challenge_data' => $this->challenge_data]);
    }

}