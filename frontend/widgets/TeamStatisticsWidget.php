<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 23/11/17
 * Time: 12:12
 */

namespace frontend\widgets;


use yii\base\Widget;

class TeamStatisticsWidget extends Widget
{

    public $team_players;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('team-statistics', ['team_players' => $this->team_players]);
    }

}