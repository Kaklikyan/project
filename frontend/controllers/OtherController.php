<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:32
 */

namespace frontend\controllers;


use common\models\Players;
use frontend\models\Teams;

class OtherController extends ParentController
{
    public function actionTeams(){

        $teams = Teams::find()->all();

        return $this->render('teams', compact('teams'));
    }

    public function actionPlayers() {

        $players = Players::find()->all();

        return $this->render('players', compact('players'));
    }
}