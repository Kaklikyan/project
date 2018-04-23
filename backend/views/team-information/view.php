<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamInformation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Team Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-information-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'games_count',
            'number_of_wins',
            'number_of_looses',
            'number_of_players',
            'last_game_link',
        ],
    ]) ?>

</div>
