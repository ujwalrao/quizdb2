<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
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
            // 'starttime',
            // 'endtime',
            // 'totalscore',
            // 'totalquestions',
            // 'department',
            // 'setterid',
[
            'label'=>'Custom Link',
            'format'=>'raw',
            'value' => function($data){
                $url = "http://localhost/quizdb2/web/index.php?Questionssearch[quizid]=".$data['quizid']."&r=questions";
                return Html::a('Edit-Questions', $url, ['class' => 'btn btn-success']);
            }
],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>
