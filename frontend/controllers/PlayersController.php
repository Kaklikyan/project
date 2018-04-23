<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 04/11/17
 * Time: 12:39
 */

namespace frontend\controllers;


use common\models\Players;

class PlayersController extends ParentController
{

    public function actionIndex($id = null) {

        if ($id == null){

            $model = new Players();
            $players = $model->find()->all();
            return $this->render('all', compact('players'));
        }else{

            $player = Players::findOne($id);

            return $this->render('index', compact('player'));
        }

    }



}