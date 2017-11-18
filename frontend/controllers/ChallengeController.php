<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 13/11/17
 * Time: 12:57
 */

namespace frontend\controllers;


use common\models\Challenges;
use common\models\ChallengeTeamStatistic;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ChallengeController extends Controller
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
                        'actions' => ['index','something', 'news', 'create-team', 'file-upload', 'my-team', 'team-info', 'create', 'refuse', 'cancel', 'confirm'],
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


    public function actionIndex() {
        $this->layout = 'profileLayout';

        $current_team_id = Yii::$app->user->identity->team_id;

        $active_challenges = Challenges::find()->where(['from' => Yii::$app->user->identity->team_id])->orWhere(['to' => Yii::$app->user->identity->team_id])->andWhere(['status' => 1])->with('challengeFrom', 'challengeTo')->all();
        $refused_challenges = Challenges::find()->where(['from' => Yii::$app->user->identity->team_id])->orWhere(['to' => Yii::$app->user->identity->team_id])->andWhere(['status' => 0])->with('challengeFrom', 'challengeTo')->all();
        $confirmed_challenges = Challenges::find()->where(['from' => Yii::$app->user->identity->team_id])->orWhere(['to' => Yii::$app->user->identity->team_id])->andWhere(['confirmed' => 1])->with('challengeFrom', 'challengeTo')->all();
        $team_challenges = Challenges::find()->where(['from' => Yii::$app->user->identity->team_id])->orWhere(['to' => Yii::$app->user->identity->team_id])->with('challengeFrom', 'challengeTo')->all();


        return $this->render('index', compact('team_challenges', 'current_team_id'));
    }

    // Creating new challenge
    public function actionCreate() {
        if (Yii::$app->request->post()){
            $post_data = Yii::$app->request->post();
            $model = new Challenges();
            $model->challenge_key = $post_data['challenge_key'];
            $model->confirmed = 0;
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

    public function actionConfirm($id, $whom) {
        return $this->actionChallengeStatisticHelper($id, $whom);
    }

    public function actionRefuse($id, $whom) {
        return $this->actionChallengeStatisticHelper($id, $whom);
    }

    // Canceling current team challenge
    public function actionCancel($id) {
        $challenge = Challenges::findOne($id);
        if($challenge->delete()){
            Yii::$app->session->setFlash('rematch-cancel', 'Challenge canceled');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    // Confirm and Refuse functionality
    protected function actionChallengeStatisticHelper($id, $whom) {

        if (strpos(Yii::$app->request->url, 'confirm') !== false) {
            $challenge_statistic = new ChallengeTeamStatistic();
            $challenge_statistic->challenge_id = $id;
            $challenge_statistic->who = '' . Yii::$app->user->identity->team_id;
            $challenge_statistic->whom = $whom;
            $challenge_statistic->decision_date = new Expression('NOW()');
            $challenge_statistic->decision = 'confirm';

            $challenge = Challenges::findOne($id);
            $challenge->confirmed = 1;

            if ($challenge->validate() && $challenge_statistic->validate()){
                $challenge->update();
                $challenge_statistic->save();
                Yii::$app->session->setFlash('challenge-confirmed', 'Challenge confirmed');
                return $this->redirect('/challenge/index');
            }
        }else{
            $challenge_statistic = new ChallengeTeamStatistic();
            $challenge_statistic->challenge_id = $id;
            $challenge_statistic->who = '' . Yii::$app->user->identity->team_id;
            $challenge_statistic->whom = $whom;
            $challenge_statistic->decision_date = new Expression('NOW()');
            $challenge_statistic->decision = 'refuse';

            $challenge = Challenges::findOne($id);
            $challenge->status = 0;
            if ($challenge->validate() && $challenge_statistic->validate()) {
                $challenge->update();
                $challenge_statistic->save();
                Yii::$app->session->setFlash('challenge-refused', 'Challenge refused');
                return $this->redirect('/challenge/index');
            }
        }
    }
}