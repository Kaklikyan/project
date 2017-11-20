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
        border: 2px solid #d95d05;
        padding: 20px 10px;
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
')

?>

<div>asdasd</div>
<div class="parent-flex-div">
    <div>
        <?= Html::img('@web/images/' . $first_component->title . '/' . $first_component->logo)?>
        <?= Html::a($first_component->title, Url::to(['/teams/', 'id' => $first_component->id]))?>
    </div>
    <div><?=$second_component?></div>
    <div>
        <?= Html::img('@web/images/' . $third_component->title . '/' . $third_component->logo)?>
        <?= Html::a($third_component->title, Url::to(['/teams/', 'id' => $third_component->id]))?>
    </div>
</div>
