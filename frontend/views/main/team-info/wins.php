<?php

use yii\helpers\Html;
use \kartik\datetime\DateTimePicker;

$this->title = 'Wins - ' . $current_team->title;
    //print_r($wins_data);die;

?>

<h3>Winning Matches</h3>
<?php foreach ($wins_data['matches'] as $match) : ?>
    <div id="match-<?=$match['id']?>" class="results-content" >
        <div class="results-content-main">
            <div class="results-content-top">
                <div class="col-md-4 results-date">Yerevan -
                    <?=date("d/m/y", strtotime($match['match_date']))?>
                </div>
                <div class="col-md-4 col-md-offset-4 results-top-buttons">
                    <?= Html::img('@web/images/three-circling-arrows.png', ['style' => 'margin-right: 8px;', 'class' => 'results-rematch', 'data-toggle'=>"modal",  'data-target'=>"#rematch-modal"]) ?>
                    <?= Html::img('@web/images/round-add-button.png', ['class' => 'results-info']) ?>
                </div>
            </div>
            <div class="results-content-bottom">
                <div class="results-team <?= $match['first']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                    <?= Html::img('@web/images/' . $match['first']['title'] . '/' . $match['first']['logo'], ['class' => 'results-image'])?>
                    <?= Html::a($match['first']['title'], '/players/') ?>
                </div>
                <div class="results-score"><?= $match['match_score'] ?></div>
                <div class="results-team <?= $match['second']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' ?>">
                    <?= Html::img('@web/images/' . $match['second']['title'] . '/' . $match['second']['logo'], ['class' => 'results-image'])?>
                    <?= Html::a($match['second']['title'], '/players/') ?>
                    <div></div>
                </div>
            </div>
            <div class="additional-info">
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
    <hr style="width: 30%; border-color: #d4d4d4">
<?php endforeach; ?>


<!-- Modal -->
<div id="rematch-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" style="border: none;background-color: #f1f1f1">
            <div class="modal-header" style="background-color: white">
                <i class="fa fa-times close" style="color: black; opacity: 1" data-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="modal-body">
                <!-- Appending team content through js -->
                <div class="teams-content"></div>
                <!-- Halls content -->
                <div class="rematch-block clearfix">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="rematch-content">
                                <!--<h3 style="margin: 0 0 10px 0; text-align: center">Choose a Field</h3>-->
                                <div class="single-item" style="border-radius: 4px;">
                                    <?php foreach ($halls as $hall) :?>
                                        <li id="<?=$hall->id;?>"><?=Html::img('/backend/web/images/halls/'. $hall->id .'/main.jpg', ['style' => 'width: 100%; height: 300px; border-radius: 4px; outline: none;'])?></li>
                                    <?php endforeach; ?>
                                </div>
                                <?php foreach($halls as $hall) : ?>
                                    <div id="hall-info-<?=$hall->id?>" class="container-fluid hall-content">
                                        <input type="hidden" value="<?=$hall->id?>">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="hall-info">
                                                    <h3><span style="border-bottom: 1px solid black">Details</span><?=Html::img('@web/images/clipboard.png', ['style' => 'height: 22px;margin-left: 5px;margin-bottom: 1px;'])?></h3>
                                                    <div class="hall-info-lines">
                                                        <div class="title">LvL</div>
                                                        <div class="line">-</div>
                                                        <div class="value"><?=$hall->level?></div>
                                                    </div>
                                                    <div class="hall-info-lines">
                                                        <div class="title">Total Matches</div>
                                                        <div class="line">-</div>
                                                        <div class="value"><?=$hall->level?><?=$hall->total_matches?></div>
                                                    </div>
                                                    <div class="hall-info-lines">
                                                        <div class="title">Field length</div>
                                                        <div class="line">-</div>
                                                        <div class="value"><?=$hall->level?><?=$hall->gate_height?> Meter</div>
                                                    </div>
                                                    <div class="hall-info-lines">
                                                        <div class="title">Field width</div>
                                                        <div class="line">-</div>
                                                        <div class="value"><?=$hall->level?><?=$hall->gate_width?> Meter</div>
                                                    </div>
                                                    <div class="hall-info-lines">
                                                        <div class="title">Address</div>
                                                        <div class="line">-</div>
                                                        <div class="value"><?=$hall->level?><?=$hall->address?></div>
                                                    </div>
                                                    <h4>Description</h4>
                                                    <div><?=$hall->level?><?=$hall->description?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="hall-map">
                                                    <h3><span style="border-bottom: 1px solid black">Placement on Map</span><?=Html::img('@web/images/placeholder-for-map.png', ['style' => 'height: 22px;margin-left: 5px;margin-bottom: 1px;'])?></h3>
                                                    <iframe src="<?=$hall->on_map?>" width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="match-settings">
                                    <div class="match-settings-date">
                                        <h4><span class="title-span">Match Date </span><?=Html::img('@web/images/calendar.png', ['class' => 'icon'])?></h4>
                                        <!-- Date picker widget -->
                                        <?= DateTimePicker::widget([
                                                'language' => 'fr',
                                            'name' => 'rematch-date',
                                            'type' => DateTimePicker::TYPE_INLINE,
                                            'value' => '23-Feb-1982, 14:45',
                                            'pluginOptions' => [
                                                'format' => 'dd-M-yyyy, hh:ii'
                                            ],
                                            'options' => [
                                                    'class' => 'rematch-date form-control input-sm text-center'
                                            ]
                                        ]);;?>
                                    </div>
                                    <div class="match-settings-buttons">
                                        <h4><span class="title-span">Additional Settings </span><?=Html::img('@web/images/settings.png', ['class' => 'icon'])?></h4>
                                        <div class="checkbox">
                                            <input type="checkbox" id="duration" name="duration" value="" />
                                            <label for="duration">
                                                <span><!-- This span is needed to create the "checkbox" element --></span>Duration
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="referee" name="referee" value="" />
                                            <label for="referee">
                                                <span><!-- This span is needed to create the "checkbox" element --></span>Referee
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="vest" name="vest" value="" />
                                            <label for="vest">
                                                <span><!-- This span is needed to create the "checkbox" element --></span>Vest
                                            </label>
                                        </div>
                                    </div>
                                    <div class="" style="flex: 1; position: relative;">
                                        <h4><span class="title-span">Additional Information </span><?=Html::img('@web/images/info.png', ['class' => 'icon'])?></h4>
                                        <p>Success Chance - 65%</p>
                                        <div class="form-group" style="position: absolute; bottom: 0; right: 0; margin-bottom: 0">
                                            <?= Html::submitButton('Challenge', ['id' => 'rematch-button', 'class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
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


<!--<div class="col-md-12" style="display: flex">
                            <div class="results-team <?/*= $match['first']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' */?>">
                                <?/*= Html::img('@web/images/' . $match['first']['title'] . '/' . $match['first']['logo'], ['class' => 'results-image'])*/?>
                                <?/*= Html::a($match['first']['title'], '/players/') */?>
                            </div>
                            <div style="line-height: 73px; font-size: 20px">VS</div>
                            <div class="results-team <?/*= $match['second']['id'] == $match['match_winner'] ? 'results-winner result-current-team' : 'results-loser' */?>">
                                <?/*= Html::img('@web/images/' . $match['second']['title'] . '/' . $match['second']['logo'], ['class' => 'results-image'])*/?>
                                <?/*= Html::a($match['second']['title'], '/players/') */?>
                                <div></div>
                            </div>
                        </div>-->

