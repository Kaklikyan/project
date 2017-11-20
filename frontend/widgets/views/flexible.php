<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 20/11/17
 * Time: 12:25
 */

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCss('
    
    .parent-flex-div {
        display: flex; 
        text-align: center; 
        padding: 10px;
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
')

?>

<div class="results-content-top" style="background: #43b882;">
    <div class="col-md-4 results-date">Yerevan -
        fghdfgh
    </div>
    <div class="col-md-6 col-md-offset-2 results-top-buttons">
        <?=Html::a('All Challenges', '/challenge/', ['style' => 'color: white;display: block; line-height: 32px; text-decoration: underline'])?>
    </div>
</div>
<div class="parent-flex-div" style="border: 1px solid #00000045; border-top: none;">
    <div>
        <?= Html::img('@web/images/' . $challenge_data->challengeFrom->title . '/' . $challenge_data->challengeFrom->logo)?>
        <?= Html::a($challenge_data->challengeFrom->title, Url::to(['/teams/', 'id' => $challenge_data->challengeFrom->id]))?>
    </div>
    <div><?=date("d-D/M/Y \<\b\\r\> H:i", strtotime($challenge_data->challenge_date));?></div>
    <div>
        <?= Html::img('@web/images/' . $challenge_data->challengeTo->title . '/' . $challenge_data->challengeTo->logo)?>
        <?= Html::a($challenge_data->challengeTo->title, Url::to(['/teams/', 'id' => $challenge_data->challengeTo->id]))?>
    </div>
</div>

