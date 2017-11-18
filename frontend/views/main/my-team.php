<?php

/* @var  \frontend\models\Teams $team_data */
/* @var  \frontend\models\Teams $team_players */
/* @var  \frontend\models\Teams $team_challenges */

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

<div class="my-team-content-top clearfix">
    <h3 style="display: inline-block; margin: 0"><?= $team_data->title; ?></h3>
    <span class="my-team-content-top-image"><?= Html::img('/images/' . $team_data->title . '/' . $team_data->logo, ['class' => 'my-team-image']); ?></span>
</div>
<div class="team-information clearfix">
    <div class="container-fluid">
        <div class="row">
            <?php if (empty($team_data->information)) : ?>
                <div style="padding: 48px 0">
                    <h3 style="text-align: center">Your team have no information</h3>
                </div>
            <?php else :?>
                <div class="col-md-3 no-padding">
                    <div class="team-information-column">
                        <div class="team-appearing-div">
                            <a href="<?= Url::to(['main/team-info', 'key' => 'total']); ?>" class="btn btn-primary btn-sm team-information-button">View more</a>
                        </div>
                        <h4>Total games</h4>
                        <?= $team_data->information->games_count ?>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div class="team-information-column">
                        <div class="team-appearing-div">
                            <a href="<?= Url::to(['main/team-info', 'key' => 'wins']); ?>" class="btn btn-primary btn-sm team-information-button">View more</a>
                        </div>
                        <h4>Total wins</h4>
                        <?= $team_data->information->number_of_wins ?>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div class="team-information-column">
                        <div class="team-appearing-div">
                            <a href="<?= Url::to(['main/team-info', 'key' => 'looses']); ?>" class="btn btn-primary btn-sm team-information-button">View more</a>
                        </div>
                        <h4>Total looses</h4>
                        <?= $team_data->information->number_of_looses ?>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div class="team-information-column-last">
                        <div class="team-appearing-div">
                            <a href="" class="btn btn-primary">View more</a>
                        </div>
                        <h4>Total players</h4>
                        <?= $team_data->information->number_of_players ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="my-team-content-main clearfix">
    <table class="players-table table table-hover">
        <thead class="thead-inverse">
            <tr>
                <th>Player name</th>
                <th>Age</th>
                <th>Level</th>
                <th>Goals</th>
                <th>Passes</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($team_players as $player) : ?>
                <?php if (isset($player->is_user) != 'no') : ?>
                    <?php $confirm_players = true; $confirm_players_array[] = $player ?>
                <?php else: ?>
                    <tr>
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
                        <td>
                            <div id="<?=$player->id?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row" style="display: flex; flex-flow: row wrap;">
                                                    <h4 class="modal-title" style="padding: 0 15px; width: 100%;"><?=$player->player_name?></h4>
                                                    <div class="col-md-5">
                                                        <div class="player-modal-left">
                                                            <img src="<?= '/images/' . $team_data->title . '/players/' . $player->player_name . '.png'?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="player-modal-right">
                                                            <div>Shoots level : </div>
                                                            <div>Pass level : </div>
                                                            <div>Speed level : </div>
                                                            <div>Physic level : </div>
                                                            <div>Team leader level : </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4 style="margin-top: 45px;">Player description</h4>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if($confirm_players) : ?>
    <div class="need-confirm-players clearfix">
        <h4>These players didn't confirm your invite yet</h4>
        <?php foreach ($confirm_players_array as $confirm_player_array) : ?>
            <div class="col-md-3">
                <div class="not-confirmed-player" style="background: white;">
                    <h4 style="text-align: center"><?=$confirm_player_array->username?></h4>
                    <?= Html::img('/images/preview.gif', ['style' => 'width: 100%'])?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endif; ?>