<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 25/11/17
 * Time: 12:13
 */


use frontend\widgets\CurrentTeamMatchWidget;
use frontend\widgets\RematchModalWidget;

    if(Yii::$app->session->hasFlash('rematch')) :?>
        <div class="alert alert-success" style="text-align: center">
            <?=Yii::$app->session->getFlash('rematch')?>
        </div>
        <?php endif; ?>
        <?php if(Yii::$app->session->hasFlash('rematch-cancel')) :?>
        <div class="alert alert-danger" style="text-align: center">
            <?=Yii::$app->session->getFlash('rematch-cancel')?>
        </div>
    <?php endif;

    if(isset($match)) echo CurrentTeamMatchWidget::widget(['match' => $match]);
    else echo CurrentTeamMatchWidget::widget(['matches' => $matches]);
    echo RematchModalWidget::widget(['halls' => $halls]);

?>

