<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 23/11/17
 * Time: 12:12
 */

namespace frontend\widgets;


use yii\base\Widget;

class PlayersStatisticsWidget extends Widget
{

    public $team_players;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('players-statistics', ['team_players' => $this->team_players]);
    }

}