<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Football';

?>

<div id="middleContent">
    <ul class="bxslider">
        <li><img src="/images/231.jpg" /></li>
        <li><img src="/images/football-field.png" /></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="picture">
                            <img src="/images/231.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h3>Some text</h3>
                            Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <div class="col-md-6">
                        <div class="text">
                            <h3>Some text</h3>
                            Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="picture">
                            <img src="/images/231.jpg">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <div class="col-md-6">
                        <div class="picture">
                            <img src="/images/231.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h3>Some text</h3>
                            Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <div class="col-md-6">
                        <div class="text">
                            <h3>Some text</h3>
                            Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </div>
                        <a href="main/index" id="left" class="btn btn-info">button</a>
                    </div>
                    <div class="col-md-6">
                        <div class="picture">
                            <img src="/images/231.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footerLeft">
                <h3>Ուղարկել նամակ</h3>
                    <div class="messageForm">
                        <?php $form = ActiveForm::begin(['id' => 'form-message']); ?>

                        <?= $form->field($model, 'Sender')->textInput()->label('Նշեք ձեր տվյալները', ['class' => 'message-label']) ?>

                        <?= $form->field($model, 'SenderEmail')->textInput()->label('Նշեք ձեր Email-ը', ['class' => 'message-label']) ?>

                        <?= $form->field($model, 'Message')->textarea(['style' => 'width: 100%'])->label('Նշեք ձեր նամակը', ['class' => 'message-label']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Ուղարկել', ['class' => 'btn btn-success', 'name' => 'send-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="successMessage" style="display: none;"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footerMiddle">
                    <h3>Communication</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footerRight">
                    <h3>Some menu</h3>
                </div>
            </div>
        </div>
    </div>
</footer>



<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });
</script>



