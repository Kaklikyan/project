<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:32
 */

namespace frontend\controllers;


use common\models\Challenges;
use common\models\Players;
use common\models\PlayersSearch;
use common\models\User;
use frontend\models\MatchesInfo;
use frontend\models\Teams;
use frontend\models\TeamsSearch;
use Yii;
use yii\db\ActiveQuery;
use yii\db\Expression;

class OtherController extends ParentController
{
    public function actionTeams($id = null){

        if($id) {
            $few_matches_data = MatchesInfo::find()->where(['first_side' => $id])->orWhere(['second_side' => $id])->orderBy(new Expression('rand()'))->limit(3)->with('first', 'second')->all();
            $last_match_data = MatchesInfo::find()->where(['first_side' => $id])->orWhere(['second_side' => $id])->orderBy('match_date desc')->limit(1)->with('first', 'second')->one();

            $closest_challenge = Challenges::find()->where(['from' => $id])->orWhere(['to' => $id])->andWhere(['confirmed' => 1])->orderBy('challenge_date asc')->limit(1)->with(['challengeFrom', 'challengeTo', 'field' => function(ActiveQuery $q){
                $q->select(['id', 'address']);
            }])->one();

            $team_data = Teams::find()->where(['id' => $id])->with(['players', 'information'])->one();

            $team_players = [];

            //print_r($team_data);die;

            foreach ($team_data->players as $key => $player) {
                if($player->is_user == 0){
                    $team_players[$key] = $player;
                }else{
                    $team_players[$key] = User::find()->where(['token' => $player->is_user])->one();
                }
            }


            return $this->render('team', compact('team_data', 'team_players', 'closest_challenge', 'few_matches_data', 'last_match_data'));

        }

        $searchModel = new TeamsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('teams', compact('dataProvider', 'searchModel'));
    }

    public function actionPlayers($id = null) {

        if ($id) {

            $model = new Players;
            $player = $model->find()->where(['id' => $id])->with('team')->one();

            return $this->render('player', compact('player'));

        }


        $searchModel = new PlayersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('players', compact('dataProvider', 'searchModel'));
    }

    public function actionFields($id = null) {
        if ($id === null){
            return $this->render('fields');
        }else
            return $this->render('fields');
    }
}