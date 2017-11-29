<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:34
 */

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

$this->title = 'Teams';

?>


<?php /*foreach ($teams as $team) : */?><!--
<div class="col-md-3">
    <div style="width: 45px; display: inline-block"><?/*=\yii\helpers\Html::img('@web/images/' . $team->title . '/' . $team->logo, ['style' => 'width: 45px'])*/?></div>
    <div style="display: inline-block; vertical-align: bottom">
        <p style="margin: 0; color: #d3d3d3">Level: 11</p>
        <p style="margin: 0"><?/*=$team->title*/?></p>
    </div>
</div>
--><?php /*endforeach; */?>

<h1><?= Html::encode($this->title) ?></h1>
<?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'rowOptions' => ['style' => 'text-align: center'],
    'headerRowOptions' => ['style' => 'text-align: center'],
    'columns' => [
        [
            'attribute' => 'Team',
            'format' => 'raw',
            'contentOptions' =>['style'=>'width:120px;'],
            'value' => function ($data) {
                return Html::img('@web/images/' . $data->title . '/' . $data->logo, ['style' => 'width: 32px']) . $data->title; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
        ],
        'creator',
        //'title',
        'challenge',
        'information.games_count',
        'information.number_of_wins',
        'information.number_of_looses',
        'information.number_of_players',
        // 'address',
        // 'length',
        // 'width',
        // 'total_matches',
        // 'description',

        ['class' => 'yii\grid\ActionColumn'],
    ],

])
?>
