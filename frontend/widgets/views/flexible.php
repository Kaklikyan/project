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
        padding: 14px;
        border-top: none;
    }
        
    .parent-flex-div div:first-child, .parent-flex-div div:last-child{
        flex: 1;   
    }
    
    .parent-flex-div div:nth-child(2) {
        min-width: 100px;
        line-height: 45px;
    }

    img {
        width: 45px;
    }
');

?>
<!--class="results-content-top"-->
<div style="border-bottom: 3px solid #e49f13; display: flex;">
    <div style="flex: 1;"><h4 style="margin: 0; text-align: left">Closest Challenge</h4></div>
    <?php if($challenge_data) : ?>
        <div style="flex: 1; text-align: right; padding: 10px"><?=Html::a('Challenge details', '/challenge/')?></div>
    <?php endif; ?>
</div>
<?php if($challenge_data) : ?>
    <div style="padding: 10px 10px 0 10px; flex: 1; line-height: 16px;"><h5 style="margin: 0; text-align: center"><?=date("d-D/M/Y H:i", strtotime($challenge_data->challenge_date));?></h5></div>
<?php endif; ?>
<div class="parent-flex-div">
    <?php if($challenge_data) : ?>
        <div>
            <?= Html::img('@web/images/' . $challenge_data->challengeFrom->title . '/' . $challenge_data->challengeFrom->logo)?>
            <?=($challenge_data->challengeFrom->id == Yii::$app->user->identity->team_id) ? '<span style="margin-right: 5px">' . $challenge_data->challengeFrom->title .'</span><i class="fa fa-user-circle" aria-hidden="true"></i>' : Html::a($challenge_data->challengeFrom->title, Url::to(['/other/teams/', 'id' => $challenge_data->challengeFrom->id]), ['style' => 'vertical-align: middle; color: #414142'])?>
        </div>
        <div><b>VS</b></div>
        <div>
            <?= Html::img('@web/images/' . $challenge_data->challengeTo->title . '/' . $challenge_data->challengeTo->logo)?>
            <?= ($challenge_data->challengeTo->id == Yii::$app->user->identity->team_id) ? '<span style="margin-right: 5px">' . $challenge_data->challengeTo->title .'</span><i class="fa fa-user-circle" aria-hidden="true"></i>' : Html::a($challenge_data->challengeTo->title, Url::to(['/other/teams/', 'id' => $challenge_data->challengeTo->id]), ['style' => 'vertical-align: middle; color: #414142'])?>
        </div>
    <?php else : ?>
        <p style="padding: 20px; text-align: center">Your team has not challenge for this moment. <?=Html::a('Challenge', '/other/teams')?> other team.</p>
    <?php endif; ?>
</div>


