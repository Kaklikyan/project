<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HomePageMessage */

$this->title = 'Update Home Page Message: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Home Page Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-page-message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
