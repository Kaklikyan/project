<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 25/11/17
 * Time: 13:00
 */

namespace frontend\widgets;


use yii\base\Widget;

class RematchModalWidget extends Widget
{

    public $halls;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('rematch-modal', ['halls' => $this->halls]);
    }

}