<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 15/12/17
 * Time: 12:54
 */

use yii\helpers\Html;

//print_r($player);die;

?>

<div class="last-productive-data" style="margin: 0">
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white; margin-right: 20px">
        <div class="player-information">
            <?php if($player->team) : ?>
                <div style="margin-right: 5px"><?=Html::img('/images/' . $player->team->title . '/' . $player->team->logo, ['class' => 'sm-logo'])?></div>
            <?php endif; ?>
            <div style="flex: 1;">
                <?php if ($player->is_user === null) :?>
                    <p style="display: inline-block; padding: 0 5px; border-radius: 3px; color: #ffffff; background-color: #ed143dd1">Not user</p>
                <?php else :?>
                    <p style="display: inline-block; padding: 0 5px; border-radius: 3px; color: #ffffff; background-color: green;">User</p>
                <?php endif; ?>
                <span style="color: #a2a1a1;"> Level 1</span>
                <h3><?=$player->name?></h3>
            </div>
            <?php if(empty($player->team)) : ?>
                <div style="flex: 1; text-align: right"><a href="" class="btn btn-warning btn-sm">Send invite request</a></div>
            <?php endif; ?>
        </div>
        <img src="/images/FutsalcelebrationFCT_large.jpg" style="max-width: 100%" alt="">
    </div>
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white">
        <div style="flex: 1">
            <div style="border-bottom: 3px solid #e49f13;">
                <h4>Player Skills</h4>
            </div>
            <ul id="skills">
                <li style="margin-top: 17px">
                    Shoots
                    <div class="bar_container">
      <span class="bar" data-bar='{ "color": "#19f" }'>
        <span class="pct"><span class="skill-point">6</span>/10</span>
      </span>
                    </div>
                </li>
                <li>
                    Speed
                    <div class="bar_container">
      <span class="bar" data-bar='{ "color": "#19f"}'>
        <span class="pct"><span class="skill-point">6</span>/10</span>
      </span>
                    </div>
                </li>
                <li>
                    Pass
                    <div class="bar_container">
      <span class="bar" data-bar='{ "color": "#19f"}'>
        <span class="pct"><span class="skill-point">6</span>/10</span>
      </span>
                    </div>
                </li>
                <li>
                    Physic
                    <div class="bar_container">
      <span class="bar" data-bar='{ "color": "#19f"}'>
        <span class="pct"><span class="skill-point">6</span>/10</span>
      </span>
                    </div>
                </li>
                <li>
                    Field Vision
                    <div class="bar_container">
      <span class="bar" data-bar='{ "color": "#19f"}'>
        <span class="pct"><span class="skill-point">6</span>/10</span>
      </span>
                    </div>
                </li>
                <li>
                    Power
                    <div class="bar_container">
      <span class="bar" data-bar='{ "color": "#19f"}'>
        <span class="pct"><span class="skill-point">9</span>/10</span>
      </span>
                    </div>
                </li>
            </ul></div>
    </div>
</div>



<div style=" margin: 20px 0;">
    <div style="display: flex;">
        <div style="flex: 1;">
            <div class="circle-container">
                <span>18 <br> Age</span>
            </div>
        </div>
        <div style="flex: 1;">
            <div class="circle-container">
                <span>18 <br> Goals</span>
            </div>
        </div>
        <div style="flex: 1;">
            <div class="circle-container">
                <span>18 <br> Assits</span>
            </div>
        </div>
        <div style="flex: 1;">
            <div class="circle-container">
                <span style="">18 <br> Age</span>
            </div>
        </div>
        <div style="flex: 1;">
            <div class="circle-container">
                <span style="">18 <br> Age</span>
            </div>
        </div>
    </div>
</div>

<div class="last-productive-data">
    <div style="flex: 1;box-shadow: 0 0 4px -1px #68686b; background-color: white; margin-right: 20px">
        dfsdfds
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


