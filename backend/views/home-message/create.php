<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HomePageMessage */

$this->title = 'Create Home Page Message';
$this->params['breadcrumbs'][] = ['label' => 'Home Page Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-page-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
