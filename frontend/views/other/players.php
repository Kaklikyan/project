<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 28/11/17
 * Time: 16:34
 */

use yii\grid\GridView;
use yii\helpers\Html;

?>

<h1><?= Html::encode($this->title) ?></h1>
<?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'rowOptions' => ['style' => 'text-align: center'],
    'columns' => [
        'id',
        'name',
        // 'address',
        // 'length',
        // 'width',
        // 'total_matches',
        // 'description',

        ['class' => 'yii\grid\ActionColumn'],
    ],

])
?>
