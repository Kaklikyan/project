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
        background: white;
        box-shadow: 0 0 4px -1px #68686b;
    }
    
    .team-statistics-th-text{
        display: inline-block;
        vertical-align: bottom;
    }
    
    .team-statistics h4{
        color: inherit;
        margin: 0;
        padding: 10px;
    }
    
    .team-statistics .top-td td {
        padding: 10px 0;
        text-align: center;
        vertical-align: middle;
        font-weight: 300;
        font-size: 12px;
        color: #414142;
        border-bottom: 1px solid #eee;
        border-right: 1px solid #eee;
    }
        
    .team-statistics .top-tr th {
        padding: 0;
        text-align: center;
        font-weight: bold;
        font-size: 14px;
        color: #337ab7;  
    }
');

//print_r($team_players);die;
?>


<!--//=Html::img('@web/images/wall-clock.png', ['style' => 'width: 24px; margin-right: 6px'])-->
<!--//=Html::img('@web/images/play-movie.png', ['style' => 'width: 24px; margin-right: 6px'])-->
<!--//=Html::img('@web/images/soccer-ball-variant.png', ['style' => 'width: 24px; margin-right: 6px'])-->
<!--//=Html::img('@web/images/group.png', ['style' => 'width: 24px; margin-right: 6px'])-->
<!--//=Html::img('@web/images/soccer-player-with-ball.png', ['style' => 'width: 24px; margin-right: 6px'])-->



<div class="team-statistics">
    <div style="border-bottom: 3px solid #337ab7;"><h4>Players Statistics</h4></div>
    <?php if($team_players) : ?>
        <div class="tbl-header" style="margin-top: 10px">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr class="top-tr">
                    <th><span class="team-statistics-th-text">Player</span></th>
                    <th><span class="team-statistics-th-text">Age</span></th>
                    <th><span class="team-statistics-th-text">Goals</span></th>
                    <th><span class="team-statistics-th-text">Assist</span></th>
                    <th><span class="team-statistics-th-text">Video</span></th>
                </tr>
                </thead>
            </table>
        </div>
        <div style="padding: 10px">
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
    <?php else : ?>
        <p style="padding: 20px; color: #a2a1a1; text-align: center ">There is no players in the team.</p>
    <?php endif; ?>
</div>
