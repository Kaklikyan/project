<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Halls */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="halls-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'on_map')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gate_width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gate_height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
        'pluginOptions' => ['previewFileType' => 'any']
    ]);?>

    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_matches')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
