<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 25/11/17
 * Time: 13:00
 */

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;

?>


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
