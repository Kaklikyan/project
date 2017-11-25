<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 25/11/17
 * Time: 12:30
 */

use yii\helpers\Html;
use yii\helpers\Url;



?>

<div id="match-<?=$match['id']?>" class="results-content" >
    <div class="results-content-main">
        <div class="results-content-top">
            <div class="col-md-4 results-date">Yerevan -
                <?=date("d/m/y", strtotime($match['match_date']))?>
            </div>
            <div class="col-md-6 col-md-offset-2 results-top-buttons">
                <?php if (strpos($match['challenges']['challenge_key'],$match['first']['id'].$match['second']['id']) !== false && $match['challenges']['status'] == 1) : ?>
                    <div class="challenge-cancel">Waiting challenge response | <a style="color: #ffaf00" href="<?= Url::to(['/challenge/cancel', 'id' => $match['challenges']['id']]) ?>">Cancel</a></div>
                    <?= Html::img('@web/images/time-left.png', ['style' => 'margin-right: 0','class' => 'rematch-waiting', 'data-hash' => $match['first']['id'].$match['second']['id']]);?>
                <?php else : ?>
                    <?= Html::img('@web/images/three-circling-arrows.png', ['class' => 'results-rematch', 'data-toggle'=>"modal",  'data-target'=>"#rematch-modal"]);?>
                <?php endif; ?>
            </div>
        </div>
        <div class="results-content-bottom" data-match="<?=$match['id']?>">
            <div class="results-team <?= $match['first']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>" data-team ="<?=$match['first']['id']?>">
                <?= Html::img('@web/images/' . $match['first']['title'] . '/' . $match['first']['logo'], ['class' => 'results-image'])?>
                <?= Html::a($match['first']['title'], '/teams/' . $match['first']['id']) ?>
            </div>
            <div class="results-score"><?= $match['match_score'] ?></div>
            <div class="results-team <?= $match['second']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>" data-team ="<?=$match['second']['id']?>">
                <?= Html::img('@web/images/' . $match['second']['title'] . '/' . $match['second']['logo'], ['class' => 'results-image'])?>
                <?= Html::a($match['second']['title'], '/teams/' . $match['second']['id']) ?>
                <div></div>
            </div>
        </div>
        <div class="additional-info" style="display: block">
            <h2 style="text-align: center">Match Information</h2>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                    <tr class="top-tr">
                        <th><?=Html::img('@web/images/group.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="additional-info-th-text">Team</span></th>
                        <th><?=Html::img('@web/images/soccer-ball-variant.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="additional-info-th-text">Goal</span></th>
                        <th><?=Html::img('@web/images/soccer-player-with-ball.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="additional-info-th-text">Assist</span></th>
                        <th><?=Html::img('@web/images/wall-clock.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="additional-info-th-text">Time</span></th>
                        <th><?=Html::img('@web/images/play-movie.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="additional-info-th-text">Video</span></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    <?php foreach ($match['matchInfoStatistics'] as $statistic) :?>
                        <tr class="top-td">
                            <td>
                                <?= Html::img('@web/images/' . $match[$statistic['side']]['title'] . '/' . $match[$statistic['side']]['logo'], ['style' => 'width: 32px']) ?>
                                <?= Html::a($match[$statistic['side']]['title'], '/teams/' . $match[$statistic['side']]['id']) ?>
                            </td>
                            <td><?= Html::a($statistic['goal']['name'], '/players/' . $statistic['goal']['id']) ?></td>
                            <td>
                                <?php
                                if (!empty($statistic['pass'])) {
                                    echo Html::a($statistic['pass']['name'], '/players/' . $statistic['pass']['id']);
                                }else{
                                    echo '<hr style="width: 14px; border-color: white">';
                                }
                                ?>
                            </td>
                            <td>08:24</td>
                            <td>Source</td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
