<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Data;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Tutorialssearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tutorials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorials-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?php
        if(Yii::$app->user->identity['role']=='setter' ||Yii::$app->user->identity['role']=='admin'  ) {
            echo Html::a('Create Tutorials', ['create'], ['class' => 'btn btn-success']);
        }?>
    </p>
<?php if(Yii::$app->user->identity['role']=='setter'||Yii::$app->user->identity['role']=='admin'){?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            'quizid',
            'tutorialid',
            'contentlink',
            'tutorialname',
            'coursename',
            // 'courseid',
            // 'tutorialtext:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php }?>

    <?php if(Yii::$app->user->identity['role']=='student'){?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            'quizid',
            'tutorialid',
            'contentlink',
            'tutorialname',
            'coursename',
            // 'courseid',
            Yii::$app->user->identity['role']=='student'?[
                'label'=>'Tutorial Link',
                'format'=>'raw',
                'value' => function($data){
                    $url = Data::$url."tutorial/show&id=".$data['tutorialid'];



                        return Html::a('Show Tutorial', $url, ['class' => 'btn btn-success']);

                }
            ] :[],

        ],
    ]); ?>

    <?php }?>
</div>
