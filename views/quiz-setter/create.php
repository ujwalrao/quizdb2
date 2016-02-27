<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuizSetter */

$this->title = 'Create Quiz Setter';
$this->params['breadcrumbs'][] = ['label' => 'Quiz Setters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-setter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
