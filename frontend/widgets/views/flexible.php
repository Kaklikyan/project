<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 20/11/17
 * Time: 12:25
 */

use yii\helpers\Html;
use yii\helpers\Url;

//print_r($challenge_data);die;

$this->registerCss('
    
    .parent-flex-div {
        display: flex; 
        text-align: center; 
        padding: 10px;
        border: 1px solid #00000045;
        border-top: none;
        margin-bottom: 20px;
    }
    
    .parent-flex-div a {
        color: #333;
    }
        
    .parent-flex-div div:first-child, .parent-flex-div div:last-child{
        flex: 1;   
    }
    
    .parent-flex-div div:nth-child(2) {
        min-width: 100px;
        line-height: 23px;
    }

    img {
        width: 45px;
    }
');

?>
<!--class="results-content-top"-->
<div style="background: #43b882; display: flex; padding: 5px 10px; margin-top: 20px">
    <div style="flex: 1; text-align: left;color: white">Yerevan - <?=Html::a($challenge_data->field->address, Url::to('/fields/' . $challenge_data->field->id), ['style' => 'color:white'])?></div>
    <div style="min-width: 200px; text-align: center; color: #c7ff7a;"><h4 style="margin: 0">Closest Challenge</h4></div>
    <div style="flex: 1; text-align: right;">
        <?=Html::a('All Challenges', '/challenge/', ['style' => 'color: white; text-decoration: underline;'])?>
    </div>
</div>
<div class="parent-flex-div">
    <div>
        <?= Html::img('@web/images/' . $challenge_data->challengeFrom->title . '/' . $challenge_data->challengeFrom->logo)?>
        <?=($challenge_data->challengeFrom->id == Yii::$app->user->identity->team_id) ? '<span class="current-team">' . $challenge_data->challengeFrom->title .'</span>' : Html::a($challenge_data->challengeFrom->title, Url::to(['/teams/', 'id' => $challenge_data->challengeFrom->id]))?>
    </div>
    <div><?=date("d-D/M/Y \<\b\\r\> H:i", strtotime($challenge_data->challenge_date));?></div>
    <div>
        <?= Html::img('@web/images/' . $challenge_data->challengeTo->title . '/' . $challenge_data->challengeTo->logo)?>
        <?= ($challenge_data->challengeTo->id == Yii::$app->user->identity->team_id) ? '<span class="current-team">' . $challenge_data->challengeTo->title .'</span>' : Html::a($challenge_data->challengeTo->title, Url::to(['/teams/', 'id' => $challenge_data->challengeTo->id]), ['class' => 'current-team'])?>
    </div>
</div>


