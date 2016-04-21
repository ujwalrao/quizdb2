<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resultssearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="results-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'quizid') ?>

    <?= $form->field($model, 'quizname') ?>

    <?= $form->field($model, 'totalscore') ?>

    <?= $form->field($model, 'obtainedscore') ?>

    <?php // echo $form->field($model, 'correctattempted') ?>

    <?php // echo $form->field($model, 'wrongattempted') ?>

    <?php // echo $form->field($model, 'totalquestions') ?>

    <?php // echo $form->field($model, 'feedback') ?>

    <?php // echo $form->field($model, 'order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
