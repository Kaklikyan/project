<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Players */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="players-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'is_user')->textInput() ?>

    <?= $form->field($model, 'in_team')->textInput() ?>

    <?= $form->field($model, 'goals')->textInput() ?>

    <?= $form->field($model, 'passes')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'captain')->textInput() ?>

    <?= $form->field($model, 'best_player_count')->textInput() ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
