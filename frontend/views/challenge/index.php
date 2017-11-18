<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 18/11/17
 * Time: 12:41
 */

/* @var  \frontend\models\Teams $team_challenges */
/* @var   $current_team_id */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php if ($team_challenges) : ?>
    <h3 style="color: #848484;">Challenges from my team</h3>
    <div class="team-challenges">
        <?php foreach ($team_challenges as $challenge) : ?>
            <div class="challenge-content">
                <div style="flex: 1;">
                    <?=Html::img('@web/images/' . $challenge->challengeFrom->title . '/' . $challenge->challengeFrom->logo)?>
                    <?= $challenge->challengeFrom->id != $current_team_id ? Html::a($challenge->challengeFrom->title, Url::to('/teams/' . $challenge->challengeFrom->id)) : '<span style="font-weight: bold; color: green;">' . $challenge->challengeFrom->title . '</span>'?>
                </div>
                <div class="challenge-arrow">-></div>
                <div style="flex: 1;">
                    <?=Html::img('@web/images/' . $challenge->challengeTo->title . '/' . $challenge->challengeTo->logo)?>
                    <?= $challenge->challengeTo->id != $current_team_id ? Html::a($challenge->challengeTo->title, Url::to('/teams/' . $challenge->challengeTo->id)) : '<span style="font-weight: bold; color: green">' . $challenge->challengeTo->title . '</span>'?>
                </div>
                <div class="challenge-details-button"><i class="fa fa-bars" aria-hidden="true"></i><span style="color: #bab6b5; margin-left: 4px">Details</span></div>
            </div>
            <div class="challenge-details">
                <div style="float: right">Challenge was mad - <?=$challenge->challenge_date?></div>
                <div>Challenge id #<?=$challenge->id?></div>
                <div>Previous match id #<?=$challenge->previous_match_id?></div>
                <div>Expecting match date - <?=$challenge->date?></div>
                <div>Duration - <?=$challenge->duration?></div>
                <div>Referee - <?=$challenge->referee?></div>
                <div>Vest - <?=$challenge->vest?></div>
                <ul style="text-align: right; padding: 0; margin: 0;">
                    <?php if ($challenge->from == $current_team_id) : ?>
                        <li style="display: inline-block;"><?=Html::a('Cancel', Url::to('/challenge/cancel/'. $challenge->id), ['class' => 'btn btn-warning'])?></li>
                    <?php else : ?>
                        <li style="display: inline-block"><?=Html::a('Refuse', Url::to('/challenge/refuse/'. $challenge->id . '/' . $challenge->from), ['class' => 'btn btn-danger'])?></li>
                        <li style="display: inline-block"><?=Html::a('Confirm', Url::to('/challenge/confirm/'. $challenge->id . '/' . $challenge->from), ['class' => 'btn btn-success'])?></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endforeach ?>
    </div>
<?php endif; ?>