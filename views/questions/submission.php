<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Data;


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

</div>
