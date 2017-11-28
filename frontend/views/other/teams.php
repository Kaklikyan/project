<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:34
 */
?>


<?php foreach ($teams as $team) : ?>
<div class="col-md-3">
    <div style="width: 45px; display: inline-block"><?=\yii\helpers\Html::img('@web/images/' . $team->title . '/' . $team->logo, ['style' => 'width: 45px'])?></div>
    <div style="display: inline-block; vertical-align: bottom">
        <p style="margin: 0; color: #d3d3d3">Level: 11</p>
        <p style="margin: 0"><?=$team->title?></p>
    </div>
</div>
<?php endforeach; ?>