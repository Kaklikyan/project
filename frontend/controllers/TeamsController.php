<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 06/11/17
 * Time: 12:24
 */

namespace frontend\controllers;


use frontend\models\Teams;

class TeamsController extends ParentController
{
    public function actionIndex($id = null) {
        if ($id == null){

            $model = new Teams();
            $teams = $model->find()->all();
            return $this->render('all', compact('teams'));
        }else{

            $team = Teams::findOne($id);

            return $this->render('index', compact('team'));
        }
    }
}