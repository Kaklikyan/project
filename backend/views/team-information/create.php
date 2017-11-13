<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TeamInformation */

$this->title = 'Create Team Information';
$this->params['breadcrumbs'][] = ['label' => 'Team Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teams' => $teams,
    ]) ?>

</div>
