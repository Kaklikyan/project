<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:34
 */

use frontend\models\Teams;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Players';

?>

<h1><?= Html::encode($this->title) ?></h1>
<?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'rowOptions' => ['style' => 'text-align: center'],
    'tableOptions' => [
        'class' => 'table table-striped table-bordered players-gridview'
    ],
    'columns' => [
        [
            'attribute' => 'name',
            'format' => 'raw',
            'contentOptions'=>[ 'style'=>'width: 150px; text-align: left'],
            'headerOptions'=>[ 'style'=>'width: 150px'],
            'value' => function($data){
                return Html::a($data->name, '/other/players/' . $data->id);
            }
        ],
        [
            'attribute' => 'in_team',
            'format' => 'raw',
            'contentOptions'=>[ 'style'=>'width: 150px; text-align: left'],
            'headerOptions'=>[ 'style'=>'width: 150px'],
            'value' => function($data){
                if ($data->in_team != 0){
                    $team = Teams::findOne($data->in_team);
                    return Html::img('@web/images/' . $team->title . '/' . $team->logo, ['style' => 'width: 32px']) . Html::a($team->title, '/other/teams/' . $team->id);;
                }else {
                    return 'Free Agent';
                }
            }
        ],
        [
            'attribute' => 'date',
            'value' => function($data){
                $age = date_diff(date_create($data->date), date_create('now'))->y;
                return $age;
            }
        ],
        [
            'attribute' => 'goals',
            'value' => function($data){
                return $data->goals;
            }
        ],
        [
            'attribute' => 'passes',
            'value' => function($data) {
                return $data->passes;
            }
        ],
        [
            'attribute' => 'captain',
            'value' => function($data) {
                if ($data->captain) return 'Yes';
                else return 'No';
            }
        ],

        // 'address',
        // 'length',
        // 'width',
        // 'total_matches',
        // 'description',
    ],

])
?>
