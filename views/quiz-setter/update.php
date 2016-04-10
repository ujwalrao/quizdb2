<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuizSetter */

$this->title = 'Update Quiz Setter: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Quiz Setters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->setterid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quiz-setter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
