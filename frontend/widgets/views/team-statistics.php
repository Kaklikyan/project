<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 23/11/17
 * Time: 12:13
 */

use yii\helpers\Html;

$this->registerCss('
    .team-statistics {
        background: linear-gradient(to bottom right, #15110f, #08ccb0);
        padding: 12px;
        border-radius: 3px;
    }
    
    .team-statistics-th-text{
        display: inline-block;
        vertical-align: bottom;
    }
    
    .team-statistics h2{
        color: white;
        margin: 0 0 6px 0;
        border-bottom: 1px solid white;
        display: inline-block;
    }
    
    .team-statistics .top-td td {
        padding: 10px 0;
        text-align: center;
        vertical-align: middle;
        font-weight: 300;
        font-size: 12px;
        color: #fff;
        border-bottom: solid 1px rgba(255,255,255,0.1);
        border-right: solid 1px rgba(255,255,255,0.1);
    }
    
    .team-statistics .top-tr th {
        padding: 12px 0;
        text-align: center;
        font-weight: 500;
        font-size: 14px;
        color: #c6ff7a;  
    }
');

//print_r($team_players);die;

?>


<div class="team-statistics">
    <h2>Team Statistics</h2>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr class="top-tr">
                <th><?=Html::img('@web/images/group.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="team-statistics-th-text">Player</span></th>
                <th><?=Html::img('@web/images/soccer-ball-variant.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="team-statistics-th-text">Age</span></th>
                <th><?=Html::img('@web/images/soccer-player-with-ball.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="team-statistics-th-text">Goals</span></th>
                <th><?=Html::img('@web/images/wall-clock.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="team-statistics-th-text">Assist</span></th>
                <th><?=Html::img('@web/images/play-movie.png', ['style' => 'width: 24px; margin-right: 6px'])?><span class="team-statistics-th-text">Video</span></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php foreach ($team_players as $player) : ?>
                <?php if (isset($player->is_user) != 'no') : ?>
                    <?php $confirm_players = true; $confirm_players_array[] = $player ?>
                <?php else: ?>
                    <tr class="top-td">
                        <td data-toggle="modal" data-target="<?='#'.$player->id?>">
                            <?= $player->player_name ;?>
                            <?php if ($player->captain == 1) : ?>
                                <span class="player-is-captain">
                                <?= Html::img('/images/fsd.png', ['style' => 'height: 30px']) ;?>
                            </span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('Y') - Yii::$app->formatter->asDate($player->player_date, 'Y'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
