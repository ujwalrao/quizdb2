<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Questions */

$this->title = $model->quizid;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'quizid' => $model->quizid, 'questionid' => $model->questionid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'quizid' => $model->quizid, 'questionid' => $model->questionid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'quizid',
            'questionid',
            'questiontext:ntext',
            'image',
            'noofoptions',
            'option1',
            'option2',
            'option3',
            'option4',
            'option5',
            'weight1',
            'weight2',
            'weight3',
            'weight4',
            'weight5',
            'maq',
            'saq',
            'essay',
        ],
    ]) ?>

</div>
