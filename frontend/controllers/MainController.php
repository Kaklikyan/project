<?php

namespace frontend\controllers;

use app\models\UploadForm;
use common\models\Challenges;
use common\models\Halls;
use common\models\Players;
use common\models\TeamInformation;
use common\models\User;
use frontend\models\MatchesInfo;
use frontend\models\TeamPlayers;
use frontend\models\Teams;
use Yii;
use yii\db\ActiveQuery;
use yii\db\Expression;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MainController extends ParentController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSomething() {

        return $this->render('profile');
    }

     public function actionNews() {
         return $this->render('news');
     }

    // Create team if user doesn't has
    public function actionCreateTeam() {

        $model = new Teams();
        $upload = new UploadForm();
        $user_model = User::findOne(Yii::$app->user->id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post();

            foreach ($post as $key => $val){
                if($val != ''){
                    $keys[] = preg_replace("/[^0-9]/","",$key);
                }
            }
            $keys = array_filter($keys, 'strlen');
            $keys = array_unique($keys);

            foreach ($keys as $k => $key){
                if(isset($post['is-user-' . $key]) && $post['is-user-' . $key] == 1){
                    $players_data[$key]['user-token'] = $post['user-token-'.$key];

                    if(isset($post['captain-'.$key])) {
                        $players_data[$key]['player-captain'] = 'on';
                    }else{
                        $players_data[$key]['player-captain'] = 'off';
                    }

                }else{
                    $players_data[$key]['player-name'] = $post['player-name'.$key];
                    $players_data[$key]['player-age'] = $post['player-age'.$key];

                    if (isset($post['captain-'.$key])){
                        $players_data[$key]['player-captain'] = 'on';
                    }else{
                        $players_data[$key]['player-captain'] = 'off';
                    }
                }
            }

            $team_title = $post['Teams']['title'];
            $team_challenge = $post['Teams']['challenge'];
            $team_image = $_FILES[0];
            $team_folder_path = \Yii::getAlias('@webroot/') . 'images/' . $team_title;
            mkdir($team_folder_path, 0777, true);
            mkdir($team_folder_path . '/players', 0777, true);
            move_uploaded_file($team_image['tmp_name'], $team_folder_path. '/' . $team_image['name']);

            foreach ($players_data as $key => $player_data){
                //print_r($player_data);die;
                if(isset($player_data['user-token'])){
                    /*$user_player = User::find()->where(['token' => $player_data['user-token']])->one();
                    $user_player->inviting_team = $model->id;
                    $user_player->save();*/
                }else{
                    $player_image = $_FILES[$key];
                    //print_r($player_image);die;
                    if($player_image['tmp_name'] != ''){
                        $tmp_name = $player_image['tmp_name'];
                        $name = basename($player_image["name"]);
                        $dot_pos = strpos($player_image["name"], '.');
                        $extension = substr($player_image["name"], $dot_pos);
                        $image_name = $player_data['player-name'].$extension;
                        move_uploaded_file($tmp_name, $team_folder_path . '/players/' . $image_name);
                    }else{
                        $file = \Yii::getAlias('@webroot/') . 'images/images.png';
                        $newfile = $team_folder_path . '/players/' . $player_data['player-name'] . '.png';
                        if (!copy($file, $newfile)) {
                            echo "failed to copy";
                        }
                    }
                }
            }
            $model->title = $team_title;
            $model->logo = $team_image['name'];
            $model->creator = Yii::$app->user->id;
            $model->challenge = $team_challenge;

            $model->save();

            $user_model->in_team = 1;
            $user_model->team_id = $model->id;
            $user_model->save();

            /*if($post['user-captain'] == 'on'){
                $user_model->is_captain = 1;
            }else{
                $user_model->is_captain = 0;
            }
            $user_model->save();*/

            foreach ($players_data as $player_data){

                $player_model = new TeamPlayers();

                if(isset($player_data['user-token'])){

                    $user = User::find()->where(['token' => $player_data['user-token']])->one();

                    $player_model->team_id =  $model->id;
                    $user->invite_confirmed =  0;
                    $player_model->is_user =  $player_data['user-token'];
                    $player_model->player_name =  $user->username;
                    $player_model->player_date =   $user->date;
                    if($player_data['player-captain'] == 'off'){
                        $player_model->captain = 0;
                    }else{
                        $player_model->captain = 1;
                    }

                    $user->save();

                }else{
                    $player_model->team_id =  $model->id;
                    $player_model->is_user =  '0';
                    $player_model->player_name =  $player_data['player-name'];
                    $player_model->player_date =   Yii::$app->formatter->asDate($player_data['player-age'], 'yyyy-MM-dd');
                    if($player_data['player-captain'] == 'off'){
                        $player_model->captain = 0;
                    }else{
                        $player_model->captain = 1;
                    }
                }

                $player_model->save();
            }

            return $this->redirect('/main/my-team');

        }else{
            return $this->render('create-team', compact('model', 'upload', 'user_model'));
        }
    }

    public  function actionMyTeam() {

        $few_matches_data = MatchesInfo::find()->where(['first_side' => Yii::$app->user->identity->team_id])->orWhere(['second_side' => Yii::$app->user->identity->team_id])->orderBy(new Expression('rand()'))->limit(3)->with('first', 'second')->all();
        $last_match_data = MatchesInfo::find()->where(['first_side' => Yii::$app->user->identity->team_id])->orWhere(['second_side' => Yii::$app->user->identity->team_id])->orderBy('match_date desc')->limit(1)->with('first', 'second')->one();

        $closest_challenge = Challenges::find()->where(['from' => Yii::$app->user->identity->team_id])->orWhere(['to' => Yii::$app->user->identity->team_id])->andWhere(['confirmed' => 1])->orderBy('challenge_date asc')->limit(1)->with(['challengeFrom', 'challengeTo', 'field' => function(ActiveQuery $q){
            $q->select(['id', 'address']);
        }])->one();

        $team_data = Teams::find()->where(['id' => Yii::$app->user->identity->team_id])->with(['players', 'information'])->one();

        $not_confirmed_players = Players::find()->where(['invite_request' => Yii::$app->user->identity->team_id])->all();

        foreach ($team_data->players as $key => $player) {
            if($player->is_user == 'no'){
                $team_players[$key] = $player;
            }else{
                $team_players[$key] = User::find()->where(['token' => $player->is_user])->one();
            }
        }

        return $this->render('/main/my-team', compact('team_data', 'team_players', 'closest_challenge', 'few_matches_data', 'last_match_data', 'not_confirmed_players'));
    }

    // Provide team's matches information
    public function actionMatches($key = null) {

        $halls = new Halls();
        $halls = $halls->find()->all();

        if($key) {
            $match = MatchesInfo::find()->where(['id' => $key])->with(['challenges','first', 'second', 'matchInfoStatistics' => function(ActiveQuery $z) {
                $z->with('goal', 'pass');
            }])->asArray()->one();

            return $this->render('matches', compact('match', 'halls'));

        }

        $matches = TeamInformation::find()->where(['team_id' => Yii::$app->user->identity['team_id']])->with(['matches' => function(ActiveQuery $q) {
            $q->andWhere(['match_winner' => Yii::$app->user->identity['team_id']])->indexBy('id')->orderBy(['match_date' => SORT_DESC])->with(['challenges','first', 'second', 'matchInfoStatistics' => function(ActiveQuery $z) {
                $z->with('goal', 'pass');
            }]);
        }])->asArray()->one();;

        return $this->render('matches', compact('matches', 'halls'));

        switch ($key) {
            case null :

                /*$wins_data = TeamInformation::find(['team_id' => Yii::$app->user->identity['team_id']])->innerJoinWith(['matches' => function(ActiveQuery $q) {
                    $q->andWhere(['!=', 'match_winner', Yii::$app->user->identity['team_id']]);
                }])->asArray()->all();*/

                return $this->render('team-info/total');
                break;

            case 'wins' :

                $halls = new Halls();


                $current_team = Teams::findOne(Yii::$app->user->identity['team_id']);

                $wins_data = TeamInformation::find()->where(['team_id' => Yii::$app->user->identity['team_id']])->with(['matches' => function(ActiveQuery $q) {
                    $q->andWhere(['match_winner' => Yii::$app->user->identity['team_id']])->indexBy('id')->orderBy(['match_date' => SORT_DESC])->with(['challenges','first', 'second', 'matchInfoStatistics' => function(ActiveQuery $z) {
                        $z->with('goal', 'pass');
                    }]);
                }])->asArray()->one();

                return $this->render('team-info/wins', compact('wins_data', 'current_team', 'halls'));
                break;

            case 'looses' :
                return $this->render('team-info/looses');
        }
    }
}
