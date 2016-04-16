<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Data;
use app\models\Results;

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
            // 'remtime',
            // 'endtime',
            // 'department',
            // 'setterid',
            [
                'attribute' => 'remtime',
                'format' => 'raw',
                'value' => function ($model) {

                        /*date_default_timezone_set('Asia/Kolkata');
                        $current_time = time();
                        $startdate= strtotime($model -> starttime);
                        $diff = $startdate - $current_time;
                        $d = ($diff/(60*60*24))%365;
                        $h = ($diff/(60*60))%24;
                        $m = ($diff/60)%60;
                        $s = ($diff)%60;
                        return $time = $d . ":" . $h . ":" . $m . ":" . $s;*/
                         $date1= date('Y-m-d H:i:s', time()+60*60*5+30*60);
                         $diff = abs(strtotime($date1) - strtotime($model -> starttime));
                       return  \russ666\widgets\Countdown::widget([
                 'datetime' => date('Y-m-d H:i:s', time()+60*60*5+30*60+$diff),
                 'format' => '%D:%H:%M:%S',
                 ]);

                },
            ],

            Yii::$app->user->identity['role']=='student' ?[
                'label'=>'Custom Link',
                'format'=>'raw',
                'value' => function($data){
                    $url = Data::$url."questions/quizattempt&id=".$data['quizid'];
                    $username=Yii::$app->user->identity['username'];
                    if($data['mattempt']=='0'&& Results::find()->where(['quizid'=>$data['quizid'],'userid'=>$username])->count()){
                        return "cant attempt";
                    }
                    else{
                        return Html::a('Attempt', $url, ['class' => 'btn btn-success']);

                    }
                }
            ] : [],
        ],
    ]); ?>
<?php Pjax::end() ?>
</div>
