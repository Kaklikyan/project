<?php

/* @var  \frontend\models\Teams $team_data */
/* @var  \frontend\models\Teams $team_players */
/* @var  \frontend\models\Teams $team_challenges */
/* @var  \frontend\models\Teams $closest_challenge */
/* @var  \frontend\models\Teams $few_matches_data */
/* @var  \frontend\models\Teams $last_match_data */
/* @var  \frontend\models\Teams $not_confirmed_players */

use frontend\widgets\FlexibleWidget;
use frontend\widgets\TeamStatisticsWidget;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My team';
$this->registerCss('
        .thead-inverse th {
            color: #fff;
            background-color: #373a3c;
        }
    ');

$confirm_players = false;
$confirm_players_array = [];


?>

<div class="my-team-content-top" style="display: flex">
    <span class="my-team-content-top-image"><?= Html::img('/images/' . $team_data->title . '/' . $team_data->logo, ['class' => 'my-team-image']); ?></span>
    <div style="flex: 1; line-height: 20px">
        <h5 style="display: inline-block; margin: 0; vertical-align: bottom; color: #a2a1a1">Level <?= $team_data->level; ?></h5>
        <h3 style="margin: 0; vertical-align: bottom"><?= $team_data->title; ?></h3>
    </div>
    <div style="flex: 1; position: relative"><a href="" style="position: absolute; bottom: 0; right: 0; font-size: 16px"><i class="fa fa-cog" aria-hidden="true"></i> Team Settings</a></div>
</div>

<p class="my-team-page-text">Improve team statistics to get highest rating in entire team's top</p>

<!--Team statistics widget-->
<?=TeamStatisticsWidget::widget(['team_players' => $team_players])?>




<div class="last-productive-data">
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white; margin-right: 20px">
        <!--Closest challenge widget-->
        <?php if($closest_challenge) echo FlexibleWidget::widget(['challenge_data' => $closest_challenge]); ?>
    </div>
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white">
        <div style="border-bottom: 3px solid #e49f13;">
            <h4>The Most Productive Match</h4>
        </div>
        <div>
            <p>Need to create functionality!</p>
        </div>
    </div>
</div>

<?php if($not_confirmed_players) : ?>
    <p class="my-team-page-text">Invite more <?=Html::a('players', '/other/players')?>.</p>
<?php endif; ?>

<div class="" style="background-color: white; box-shadow: 0 0 4px -1px #68686b; margin-top: 20px">
    <div style="border-bottom: 3px solid #008080;">
        <h4 style=" margin: 0; padding: 10px;">Invited Players</h4>
    </div>
    <div class="invited-players clearfix">
        <?php if($not_confirmed_players) : ?>
            <?php foreach ($not_confirmed_players as $not_confirmed_player) : ?>
                <div class="not-confirmed-player col-md-4">
                    <div style="display: flex; border-right: 3px dotted #a2a1a1; padding-right: 10px;">
                        <?= Html::img('/images/' . $team_data->title . '/' . $team_data->logo, ['class' => 'my-team-image']); ?>
                        <div style="flex: 1">
                            <div class="not-confirmed-content">
                                <h5 >Level <?= $team_data->level; ?></h5>
                                <h5 style="text-align: right">
                                    <?php

                                    $seconds = time() - (strtotime($not_confirmed_player->invite_date) - (60*60)*4);

                                    $days = floor($seconds / 86400);
                                    $seconds %= 86400;

                                    $hours = floor($seconds / 3600);
                                    $seconds %= 3600;

                                    $minutes = floor($seconds / 60);
                                    $seconds %= 60;

                                    if($seconds > 0 && $minutes < 1){
                                        echo $seconds . ' seconds';
                                        //return true;
                                    }elseif ($minutes > 0 && $hours < 1) {
                                        echo $minutes . ' minutes';
                                        //return true;
                                    }elseif ($hours > 0 && $days < 1) {
                                        echo $hours . ' hours';
                                        //return true;
                                    }elseif($days > 0){
                                        echo $days . ' days';
                                        //return true;
                                    }
                                    ?> ago
                                </h5>
                            </div>
                            <div style="display: flex;">
                                <h5 style="margin: 0; vertical-align: bottom; line-height: 24px; flex: 1"><?= Html::a($not_confirmed_player->name, '/players/'.$not_confirmed_player->id); ?></h5>
                                <h5 style="; margin: 0; line-height: 24px; font-weight: bold;"><?=Html::a('Cancel', '/player-transfer/cancel/'.$not_confirmed_player->id, ['style' => 'color: tomato;']); ?></h5>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach ?>
        <?php else : ?>
            <p style="padding: 20px; text-align: center">Your team didn't invite players. <?=Html::a('Start', '/other/players')?> gain your squad.</p>
        <?php endif; ?>
    </div>
</div>

<!--Last match data block-->
<div class="last-productive-data">
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white; margin-right: 20px">
        <div style="border-bottom: 3px solid #008080; display: flex">
            <h4 style="flex: 1">Last Match</h4>
            <?php if($last_match_data) : ?>
                <div style="flex: 1; padding: 10px; text-align: right">
                    <a href="/main/matches/<?=$last_match_data->id?>">Match Details</a>
                </div>
            <?php endif ?>
        </div>
        <?php if($last_match_data) : ?>
            <div style="padding: 10px 10px 0 10px; flex: 1; line-height: 16px;">
                <h5 style="margin: 0; text-align: center;"><?=date("d-D/M/Y H:i", strtotime($last_match_data->match_date))?></h5>
            </div>
            <div style="display: flex;">
                <div class="results-team <?= $last_match_data['first']['id'] == $last_match_data['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                    <?= Html::img('@web/images/' . $last_match_data['first']['title'] . '/' . $last_match_data['first']['logo'], ['class' => 'results-image'])?>
                    <?= Html::a($last_match_data['first']['title'], '/teams/' . $last_match_data['first']['id']) ?>
                </div>
                <div class="results-score"><?= $last_match_data['match_score'] ?></div>
                <div class="results-team <?= $last_match_data['second']['id'] == $last_match_data['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                    <?= Html::img('@web/images/' . $last_match_data['second']['title'] . '/' . $last_match_data['second']['logo'], ['class' => 'results-image'])?>
                    <?= Html::a($last_match_data['second']['title'], '/teams/' . $last_match_data['second']['id']) ?>
                    <div></div>
                </div>
            </div>
        <?php else : ?>
            <p>Your team has not matches yet. Make first <?=Html::a('challenge', '/other/teams')?>.</p>
        <?php endif; ?>
    </div>
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white">
        <div style="border-bottom: 3px solid #e49f13;">
            <h4>The Most Productive Match</h4>
        </div>
        <div>
            <p>Need to create functionality!</p>
        </div>
    </div>
</div>

<p class="my-team-page-text">Total count of matches is <?=$team_data->information->games_count?>. <a href="/main/matches"> View All Matches</a></p>

<div class="" style="background-color: white; box-shadow: 0 0 4px -1px #68686b">
    <div style="border-bottom: 3px solid #337ab7;">
        <h3 style=" margin: 0; padding: 10px;">Matches</h3>
    </div>
    <div class="all-matches">
        <?php foreach($few_matches_data as $match) : //print_r($match);die;?>
            <div class="all-matches-each">
                <div class="line-padding" style="font-weight: bold">
                    <?=date("d-D/M/Y H:i", strtotime($match->match_date)); ?>
                </div>
                <div class="results-team">
                    <?= Html::img('@web/images/' . $match['first']['title'] . '/' . $match['first']['logo'], ['class' => 'results-image'])?>
                    <?= ($match['first']['id'] == Yii::$app->user->identity->team_id) ? '<span class="current-team">' . $match['first']['title'] .'</span>' : Html::a($match['first']['title'], Url::to(['/teams/', 'id' => $match['first']['id']]))?>
                </div>
                <div class="results-score"><?= $match['match_score']?></div>
                <div class="results-team">
                    <?= Html::img('@web/images/' . $match['second']['title'] . '/' . $match['second']['logo'], ['class' => 'results-image'])?>
                    <?= ($match['second']['id'] == Yii::$app->user->identity->team_id) ? '<span class="current-team">' . $match['second']['title'] .'</span>' : Html::a($match['second']['title'], Url::to(['/teams/', 'id' => $match['second']['id']]))?>
                    <div></div>
                </div>
                <div class="line-padding"><a href="/main/matches/<?=$match['id']?>"  class="btn btn-success">Match Details</a></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>