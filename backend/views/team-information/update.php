<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamInformation */

$this->title = 'Update Team Information: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Team Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="team-information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
