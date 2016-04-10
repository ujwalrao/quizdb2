<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $queryresult->quizname;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $queryresult,
        'attributes' => [
            'totalscore',
            'obtainedscore',
            'Options',
            'totalquestions',
            'correctattempted',
            'wrongattempted',

        ],
    ]) ?>

</div>
