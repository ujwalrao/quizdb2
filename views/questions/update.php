<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Questions */

$this->title = 'Update Questions: ' . ' ' . $model->quizid;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quizid, 'url' => ['view', 'quizid' => $model->quizid, 'questionid' => $model->questionid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
