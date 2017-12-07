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


echo Nav::widget([
    'items' => [
        [
            'label' => 'Home',
            'url' => ['site/index'],
        ],
        [
            'label' => 'Dropdown',
            'items' => [
                ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                '<li class="divider"></li>',
                '<li class="dropdown-header">Dropdown Header</li>',
                ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
            ],
        ],
        [
            'label' => 'Login',
            'url' => ['site/login'],
            'visible' => Yii::$app->user->isGuest
        ],
    ],
    'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
]);


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
                <div class="not-confirmed-player col-md-4" style="background: white; display: inline-block; padding: 10px 0;">
                    <?= Html::img('/images/' . $team_data->title . '/' . $team_data->logo, ['class' => 'my-team-image']); ?>
                    <div style="vertical-align: bottom; display: inline-block">
                        <h5 style="display: inline-block; margin: 0; vertical-align: bottom; color: #a2a1a1">Level <?= $team_data->level; ?></h5>
                        <h5 style="margin: 0; vertical-align: bottom"><?= $not_confirmed_player->name; ?></h5>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <p style="padding: 20px; text-align: center">Your team didn't invite players. <?=Html::a('Start', '/other/players')?> gain your squad.</p>
        <?php endif; ?>
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

<div class="">
    <?php foreach($last_match_data as $match) : ?>
        <div style="display: flex;">
            <div class="results-team <?= $match['first']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                <?= Html::img('@web/images/' . $match['first']['title'] . '/' . $match['first']['logo'], ['class' => 'results-image'])?>
                <?= Html::a($match['first']['title'], '/teams/' . $match['first']['id']) ?>
            </div>
            <div class="results-score"><?= $match['match_score'] ?></div>
            <div class="results-team <?= $match['second']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                <?= Html::img('@web/images/' . $match['second']['title'] . '/' . $match['second']['logo'], ['class' => 'results-image'])?>
                <?= Html::a($match['second']['title'], '/teams/' . $match['second']['id']) ?>
                <div></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="team-information">
    <div style="cursor: pointer;" class="container-fluid">
        <div class="row">
            <?php if (empty($team_data->information)) : ?>
                <div style="padding: 48px 0">
                    <h3 style="text-align: center">Your team have no information</h3>
                </div>
            <?php else :?>
                <div class="col-md-3 no-padding">
                    <div id="all-matches" class="team-information-column detail-active">
                        <!--<div class="team-appearing-div">
                            <a href="<?/*= Url::to(['main/team-info', 'key' => 'total']); */?>" class="btn btn-primary btn-sm team-information-button">View more</a>
                        </div>-->
                        <h4>All Matches</h4>
                        <?= $team_data->information->games_count ?>
                        <img src="/images/arrow-point-to-down.png" alt="" style="position: absolute; bottom: -7px; vertical-align: bottom; transform: translateX(-50%); left: 50%; width: 28px">
                    </div>
                    <div>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div id="no-data" class="team-information-column">
                        <!--<div class="team-appearing-div">
                            <a href="<?/*= Url::to(['main/team-info', 'key' => 'wins']); */?>" class="btn btn-primary btn-sm team-information-button">View more</a>
                        </div>-->
                        <h4>Total wins</h4>
                        <?= $team_data->information->number_of_wins ?>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div id="last-match-data" class="team-information-column">
                        <h4>Last Match</h4>
                        <?= $team_data->information->number_of_looses ?>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div class="team-information-column-last">
                        <h4>Total players</h4>
                        <?= $team_data->information->number_of_players ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="team-details-parent">
        <!--Last match data block-->
        <div class="last-match-data" style="background: white; border: 1px solid #ccc; display: none;">
            <?php foreach($last_match_data as $match) : ?>
                <div style="display: flex;">
                    <div class="results-team <?= $match['first']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                        <?= Html::img('@web/images/' . $match['first']['title'] . '/' . $match['first']['logo'], ['class' => 'results-image'])?>
                        <?= Html::a($match['first']['title'], '/teams/' . $match['first']['id']) ?>
                    </div>
                    <div class="results-score"><?= $match['match_score'] ?></div>
                    <div class="results-team <?= $match['second']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                        <?= Html::img('@web/images/' . $match['second']['title'] . '/' . $match['second']['logo'], ['class' => 'results-image'])?>
                        <?= Html::a($match['second']['title'], '/teams/' . $match['second']['id']) ?>
                        <div></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="no-data" style="display: none;"><h3 style="text-align: center">There is no data</h3></div>
        <!--All matches data block-->
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
            <a href="/main/matches" style="border-radius: 0; font-size: 16px" class="btn btn-warning btn-block">View All Matches</a>
        </div>
    </div>
</div>

<!--Closest challenge widget-->
<?php if($closest_challenge) echo FlexibleWidget::widget(['challenge_data' => $closest_challenge]); ?>