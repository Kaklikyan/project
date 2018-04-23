<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 11/12/17
 * Time: 16:26
 */

namespace frontend\controllers;


use common\models\PlayersTransfer;

class PlayerTransferController extends ParentController
{

    public function actionInvite($id){

    }

    public function actionRequest($id) {

    }

    public function actionCancel($id) {

        $model = PlayersTransfer::findOne($id);
        if($model->delete()){
            return $this->redirect('/main/my-team');
        }
    }
}