<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 21/11/17
 * Time: 18:21
 */

namespace frontend\controllers;


class FieldsController extends ParentController
{
    public function actionIndex($id = null) {
        if ($id === null){
            return $this->render('index');
        }else
            return $this->render('field');
    }
}