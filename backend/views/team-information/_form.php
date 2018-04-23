<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_id')->dropDownList(\yii\helpers\ArrayHelper::map($teams, 'id', 'title'))?>

    <?= $form->field($model, 'games_count')->textInput() ?>

    <?= $form->field($model, 'number_of_wins')->textInput() ?>

    <?= $form->field($model, 'number_of_looses')->textInput() ?>

    <?= $form->field($model, 'number_of_players')->textInput() ?>

    <?= $form->field($model, 'last_game_link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
