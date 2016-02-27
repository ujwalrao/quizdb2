<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Questionssearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Questions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
           
            Pjax::begin();
            ?>
            
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'quizid',
            'questionid',
            'questiontext:ntext',
            //'image',
            //'noofoptions',
             'option1',
             'option2',
             'option3',
             'option4',
             'option5',
            // 'weight1',
            // 'weight2',
            // 'weight3',
            // 'weight4',
            // 'weight5',
            // 'maq',
            // 'saq',
            // 'essay',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php 
           
            Pjax::end();
            ?>
            

</div>
