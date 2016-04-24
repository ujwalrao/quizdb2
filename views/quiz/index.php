<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Data;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Quizsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quizzes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-index">
<?php Pjax::begin() ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?php if(Yii::$app->user->identity['role']!='admin') { ?>

        <?= Html::a('Create Quiz', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'quizid',
            'quizname',
            'inchargename',
            'courseid',
            'coursename',
            'starttime',
            'endtime',
            // 'totalscore',
            // 'totalquestions',
            // 'department',
            // 'setterid',
            Yii::$app->user->identity['role']=='setter'?[
                'label'=>'Custom Link',
                'format'=>'raw',
                'value' => function($data){
                    $url = Data::$url."quiz/analysis&id=".$data['quizid'];
                    $datetime=$data['endtime'];


                    $date1= date('Y-m-d H:i:s', time()+60*60*5+30*60);
                    $diff = max(0,(strtotime($datetime) -strtotime($date1)));
                    if($diff==0){
                        return Html::a('Quiz Analysis', $url, ['class' => 'btn btn-success']);

                    }
                    return "Quiz is still running";
                }
            ] :[],
            [
                //'label'=>'Custom Link',
                'format'=>'raw',
                'value' => function($data){
                    $url = Data::$url."results/index&id=".$data['quizid'];
                    $username=Yii::$app->user->identity['username'];

                    return Html::a('View Leaderboard', $url, ['class' => 'btn btn-success']);


                }
            ],

            Yii::$app->user->identity['role']!='admin'?[
            'label'=>'Custom Link',
            'format'=>'raw',
            'value' => function($data){
                $url = Data::$url."questions/index&id=".$data['quizid'];
                return Html::a('Edit-Questions', $url, ['class' => 'btn btn-success']);
            }
] :[],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>
