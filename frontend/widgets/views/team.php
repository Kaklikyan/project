<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 14/12/17
 * Time: 12:02
 */

use frontend\widgets\FlexibleWidget;
use frontend\widgets\PlayersStatisticsWidget;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<!--Current team main information block-->
<div class="my-team-content-top" style="display: flex; margin-bottom: 20px">
    <span class="my-team-content-top-image"><?= Html::img('/images/' . $team_data->title . '/' . $team_data->logo, ['class' => 'my-team-image']); ?></span>
    <div style="flex: 1; line-height: 20px">
        <h5 style="display: inline-block; margin: 0; vertical-align: bottom; color: #a2a1a1">Level <?= $team_data->level; ?></h5>
        <h3 style="margin: 0; vertical-align: bottom"><?= $team_data->title; ?></h3>
    </div>
    <div style="flex: 1; line-height: 23px">
        <div class="information-values">
            <?php if ($team_data->information) : ?>
                <div><?=$team_data->information->games_count ? $team_data->information->games_count : 0?></div>
                <div style="color: green"><?=$team_data->information->number_of_wins ? $team_data->information->number_of_wins : 0?></div>
                <div style="color: tomato"><?=$team_data->information->number_of_looses ? $team_data->information->number_of_looses : 0?></div>
            <?php endif; ?>
        </div>
        <div class="information-titles">
            <div><?=Html::a('Total matches', '/main/matches/', ['style' => 'color: #333'])?></div>
            <div><?=Html::a('Wins', '/main/matches/wins', ['style' => 'color: green'])?></div>
            <div><?=Html::a('Looses', '/main/matches/looses', ['style' => 'color: tomato'])?></div>
        </div>
    </div>
    <div style="flex: 1; position: relative"><a href="" style="position: absolute; bottom: 0; right: 0; font-size: 16px"><i class="fa fa-cog" aria-hidden="true"></i> Throw challenge</a></div>
</div>

<!--Team statistics widget-->
<?=PlayersStatisticsWidget::widget(['team_players' => $team_players])?>

<!--Last/productive block-->
<div class="last-productive-data">
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white; margin-right: 20px">
        <!--Closest challenge widget-->
        <?= $closest_challenge ? FlexibleWidget::widget(['challenge_data' => $closest_challenge]) : '<h4 style="border-bottom: 3px solid #e49f13">Closest Challenge</h4><p style="padding: 20px; color: #a2a1a1; text-align: center ">' . 'There is no closest match of this team' .  '</p>' ?>
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

<!--3 random matches-->
<div class="" style="background-color: white; box-shadow: 0 0 4px -1px #68686b">
    <div style="border-bottom: 3px solid #337ab7;">
        <h3 style=" margin: 0; padding: 10px;">Matches</h3>
    </div>
    <div class="all-matches">
        <?php
        if ($few_matches_data) {
            foreach ($few_matches_data as $match) : ?>
                <div class="all-matches-each">
                    <div class="line-padding" style="font-weight: bold">
                        <?= date("d-D/M/Y H:i", strtotime($match->match_date)); ?>
                    </div>
                    <div class="results-team">
                        <?= Html::img('@web/images/' . $match['first']['title'] . '/' . $match['first']['logo'], ['class' => 'results-image']) ?>
                        <?= ($match['first']['id'] == Yii::$app->user->identity->team_id) ? '<span style="vertical-align: middle; margin-right: 5px">' . $match['first']['title'] . '</span><i class="fa fa-user-circle" aria-hidden="true"></i>' : Html::a($match['first']['title'], Url::to(['/other/teams/', 'id' => $match['first']['id']])) ?>
                    </div>
                    <div class="results-score"><?= $match['match_score'] ?></div>
                    <div class="results-team">
                        <?= Html::img('@web/images/' . $match['second']['title'] . '/' . $match['second']['logo'], ['class' => 'results-image']) ?>
                        <?= ($match['second']['id'] == Yii::$app->user->identity->team_id) ? '<span style="vertical-align: middle; margin-right: 5px">' . $match['second']['title'] . '</span><i class="fa fa-user-circle" aria-hidden="true"></i>' : Html::a($match['second']['title'], Url::to(['/other/teams/', 'id' => $match['second']['id']])) ?>
                        <div></div>
                    </div>
                    <div class="line-padding"><a href="/main/matches/<?= $match['id'] ?>" class="btn btn-success">Match
                            Details</a></div>
                </div>
            <?php endforeach;
        }else{ ?>
            <p style="padding: 20px; color: #a2a1a1; text-align: center">There is no matches of this team.</p>
        <?php } ?>
    </div>
</div>
