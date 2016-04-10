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
            'Options',
            // 'starttime',
            // 'endtime',
            // 'department',
            // 'setterid',

            Yii::$app->user->identity['role']=='student' ?[
                'label'=>'Custom Link',
                'format'=>'raw',
                'value' => function($data){
                    $url = Data::$url."questions/quizattempt&id=".$data['quizid']."&opt=".$data['Options'];
                    return Html::a('Attempt', $url, ['class' => 'btn btn-success']);
                }
            ] : [],
        ],
    ]); ?>
<?php Pjax::end() ?>
</div>
