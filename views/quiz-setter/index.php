<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuizSetterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quiz Setters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-setter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Quiz Setter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'setterid',
            'password',
            'about:ntext',
            'name',
            'dept',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
