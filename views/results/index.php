<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Resultssearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="results-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userid',
//            'quizid',
            'quizname',
            'totalscore',
            'obtainedscore',
             'correctattempted',
             'wrongattempted',
             'totalquestions',
            // 'feedback:ntext',
            // 'order',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
