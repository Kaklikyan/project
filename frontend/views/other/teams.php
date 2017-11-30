<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:34
 */

use common\models\User;
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
    'tableOptions' => [
        'class' => 'table table-striped table-bordered teams-gridview'
    ],
    'rowOptions' => ['style' => 'text-align: center'],
    'columns' => [
        [
            'attribute' => 'Team',
            'format' => 'raw',
            'contentOptions'=>[ 'style'=>'width: 150px; text-align: left'],
            'headerOptions'=>[ 'style'=>'width: 150px'],
            'value' => function ($data) {
                return Html::img('@web/images/' . $data->title . '/' . $data->logo, ['style' => 'width: 32px']) . Html::a($data->title, '/teams/' . $data->id); // $data['name'] for array data, e.g. using SqlDataProvider.
            },
        ],
        'level',
        'information.games_count',
        [
            'attribute' => 'information.number_of_wins',
            'format' => 'raw',
            'value' => function($data){
                if ($data->information['games_count']){
                    $percentage = ($data->information['number_of_wins'] * 100) / $data->information['games_count'];
                    $result =  ($percentage > 50) ?  $data->information['number_of_wins'] . ' - ' . '<span style="color: green">' . round($percentage, 1).'%</span>' : $data->information['number_of_wins'] . ' - ' . '<span style="color: red">' . round($percentage, 1).'%</span>';
                    return $result;
                }
            }
        ],

        [
            'attribute' => 'information.number_of_looses',
            'format' => 'raw',
            'value' => function($data){
                if ($data->information['games_count']){
                    $percentage = ($data->information['number_of_looses'] * 100) / $data->information['games_count'];
                    $result =  ($percentage > 50) ?  $data->information['number_of_looses'] . ' - ' . '<span style="color: red">' . round($percentage, 1).'%</span>' : $data->information['number_of_looses'] . ' - ' . '<span style="color: green">' . round($percentage, 1).'%</span>';
                    return $result;
                }
            }
        ],
        [
            'attribute' => 'Creator',
            'format' => 'raw',
            'value' => function ($data) {
                $user = User::findOne($data->creator);
                return Html::a($user->username, '/users/' . $user->id); // $data['name'] for array data, e.g. using SqlDataProvider.
            },
        ],
        [
            'attribute' => 'challenge',
            'format' => 'raw',
            'value' => function($data){
                if($data->challenge == 0) return '<span style="color: red">Off</span>';
                else return '<span style="color: green">On</span>';
            }
        ],
        'information.number_of_players',
        // 'address',
        // 'length',
        // 'width',
        // 'total_matches',
        // 'description',

        //['class' => 'yii\grid\ActionColumn'],
    ],

])
?>
