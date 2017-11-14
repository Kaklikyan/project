<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 13/11/17
 * Time: 12:57
 */

namespace frontend\controllers;


use common\models\Challenges;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
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
                        'actions' => ['index','something', 'news', 'create-team', 'file-upload', 'my-team', 'team-info', 'challenge', 'cancel'],
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

    /*public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }*/

    public function actionChallenge() {
        if (Yii::$app->request->post()){

            $post_data = Yii::$app->request->post();

            $model = new Challenges();

            $model->challenge_key = $post_data['challenge_key'];
            $model->from = $post_data['from'];
            $model->to = $post_data['to'];
            $model->previous_match_id = $post_data['previous_match_id'];
            $model->date = date('Y-m-d H:i', strtotime($post_data['date']));
            $model->duration = $post_data['duration'];
            $model->referee = $post_data['referee'] ? 1 : 0;
            $model->vest = $post_data['vest'] ? 1 : 0;
            $model->status = 1;
            $model->challenge_date = new Expression('NOW()');

            if($model->save()){
                Yii::$app->session->setFlash('rematch', 'Challenge is done.');
                exit();
            }
        }
    }

    public function actionCancel($id) {

        $challenge = Challenges::findOne($id);
        if($challenge->delete()){
            Yii::$app->session->setFlash('rematch-cancel', 'Challenge is canceled');
            return $this->redirect('/main/team-info/wins');
        }
    }
}