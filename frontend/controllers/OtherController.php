<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:32
 */

namespace frontend\controllers;


use common\models\Players;
use common\models\PlayersSearch;
use frontend\models\Teams;
use frontend\models\TeamsSearch;
use Yii;

class OtherController extends ParentController
{
    public function actionTeams(){

        $searchModel = new TeamsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('teams', compact('dataProvider', 'searchModel'));
    }

    public function actionPlayers() {

        $searchModel = new PlayersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('players', compact('dataProvider', 'searchModel'));
    }
}