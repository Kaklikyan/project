<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 13/11/17
 * Time: 12:57
 */

namespace frontend\controllers;


use Yii;
use yii\base\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class MatchController extends Controller
{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','signup', 'index'],
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','something', 'news', 'create-team', 'file-upload', 'my-team', 'team-info', 'challenge'],
                        'roles' => ['@']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'challenge'  => ['POST'],
                ],
            ],
        ];
    }

    public function actionChallenge() {
        if (Yii::$app->request->post()){

            $model;

            $post_data = Yii::$app->request->post();
            echo date('Y-m-d H:i', strtotime($post_data['date']));die;
        }
    }
}