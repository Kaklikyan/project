<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 25/11/17
 * Time: 12:29
 */

namespace frontend\widgets;


use yii\base\Widget;

class CurrentTeamMatchWidget extends Widget
{
    public $match;
    public $matches;

    public function init()
    {

    }

    public function run()
    {
        if (!empty($this->match)) return $this->render('current-team-match', ['match' => $this->match]);
        else return $this->render('current-team-matches', ['matches' => $this->matches]);
    }

}