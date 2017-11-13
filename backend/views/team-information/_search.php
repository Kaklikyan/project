<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'games_count') ?>

    <?= $form->field($model, 'number_of_wins') ?>

    <?= $form->field($model, 'number_of_looses') ?>

    <?= $form->field($model, 'number_of_players') ?>

    <?php // echo $form->field($model, 'last_game_link') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
