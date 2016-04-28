
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Data;
use yii\bootstrap\ActiveForm;
use app\models\user;
use app\models\Virtualquiz;
use \russ666\widgets\Countdown;


$this->title = $queryresult->quizname;
//$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' =>  Data::$url."questions&id=".$id];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $queryresult,
        'attributes' => [
            'totalscore',
            'obtainedscore',
            'totalquestions',
            'correctattempted',
            'wrongattempted',

        ],
    ]) ?>
<?php
$url=Data::$url."virtual/display&id=".$id;
    
?>
    <?= Html::a('View Solutions', $url, ['class' => 'btn btn-success']); ?>

</div>

