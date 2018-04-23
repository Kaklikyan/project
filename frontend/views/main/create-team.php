<?php
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;



?>

<div class="create-team">
    <div class="top-part">
        <h3 style="color: green">Create team</h3>
        <p>asdasdasd</p>
        <div class="row">
            <div class="col-md-12">
                <div class="form-part">
                    <?php $form = ActiveForm::begin(
                        [
                            'id' => 'team-form',
                            'action' => '/main/create-team',

                            /*'enableClientValidation' => false,
                            'validateOnBlur' => false,
                            'validateOnType' => false,
                            'validateOnChange' => false*/
                        ]); ?>
                    <?= $form->field($model, 'title', ['enableAjaxValidation' => true])->textInput()->label('Team title');?>
                    <?= $form->field($upload, 'imageFile')->fileInput(['name' => '0'])->label('Team logo') ?>
                    <?= $form->field($model, 'challenge')->checkbox()->label(false); ?>
                    <span id="add-player" class="btn btn-primary">Append player</span>
                    <div class="additional-fields">
                        <div class="additional-field" style="display: block">
                            <div class="col-md-3">
                                <div class="player-card">
                                    <span class="field-remove" style="visibility: hidden;">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>

                                    <label for="creator-name" class="name-label">Player name</label>
                                    <input class="additional-name-field" name="creator-name" disabled="disabled" style="background-color: #eee;cursor: not-allowed" type="text" value="<?=$user_model->username?>">

                                    <label for="creator-age<?=$user_model->id?>" class="age-label">Player age</label>
                                    <?php echo DatePicker::widget([
                                        'name' => 'creator-age'.$user_model->id,
                                        'value' => $user_model->id,
                                        'template' => '{addon}{input}',
                                        'clientOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-M-yyyy',
                                            'disableEntry'=>true,
                                        ],
                                        'options' => [
                                            'readonly' => 'readonly'
                                        ]
                                    ]);
                                    ?>

                                    <label for="creator-field" class="photo-label">Player photo</label>
                                    <input type="file" name="creator-field" data-buttonBefore="true" class="filestyle" data-buttonText="Choose photo" data-buttonName="btn-primary" data-icon="false">

                                    <input id="0" class="leader-check" name="user-captain" checked type="checkbox" <!--style="display:none;"-->
                                </div>
                            </div>
                        </div>

                        <?php for ($i = 1; $i < 11; $i++) : ?>
                            <div class="additional-field" data-key="<?=$i?>" style="display: none">
                                <div class="col-md-3">
                                    <div class="player-card">

                                        <div class="player-card-first-part">
                                            <span class="field-remove"><i class="fa fa-times" aria-hidden="true"></i></span>

                                            <div class="is-user">
                                                <div class="is-user-question">
                                                    <span class="is-user-label"><?= Html::label('Is the player user?', 'is-user-' . $i,['style' => 'display: inline-block']); ?></span>
                                                    <span class="is-user-checkbox"><?= Html::checkbox('is-user-' . $i, false, ['style' => 'float: right']); ?></span>
                                                </div>
                                                <div class="user-token">
                                                    <?= Html::label('User token', 'user-token-' . $i); ?>
                                                    <?= Html::textInput('user-token-' . $i, '', ['class' => ['user-additional-name-field', 'is-user-adding-class'], 'disabled' => true]); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="player-card-second-part">
                                            <label for="player-name<?=$i?>" class="name-label">Player name</label>
                                            <input class="additional-name-field" name="player-name<?=$i?>" type="text" placeholder="Anun/Azganun">

                                            <label for="player-age<?=$i?>" class="age-label">Player age</label>
                                            <?php echo DatePicker::widget([
                                                'name' => 'player-age'.$i,
                                                'value' => '',
                                                'template' => '{addon}{input}',
                                                'clientOptions' => [
                                                    'autoclose' => true,
                                                    'format' => 'dd-M-yyyy'
                                                ]
                                            ]);
                                            ?>

                                            <label for="<?=$i?>" class="photo-label">Player photo</label>
                                            <input type="file" name="<?=$i?>" data-buttonBefore="true" class="filestyle" data-buttonText="Choose photo" data-buttonName="btn-primary" data-icon="false">

                                            <div class="is-captain">
                                                <span class="is-captain-label">
                                                    <?= Html::label('Captain', 'captain-' . $i, ['style' => 'display: inline-block']); ?>
                                                </span>
                                                <span class="is-captain-checkbox">
                                                    <?= Html::checkbox('captain-' . $i, false, ['class' => 'leader-check', 'id' => $i])?>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="is-user-validation">Put the user(s) token</div>
                    <div class="inputValidate">Please fill in the inputs</div>
                    <div class="checkboxValidate">Please select the captain</div>
                    <div class="field-count-message">In team should be at least 5 players</div>

                    <div class="form-group">
                        <?= Html::submitButton('Create team', ['id' => 'send-form','class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>