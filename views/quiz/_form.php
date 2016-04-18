<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Quiz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quizname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inchargename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'courseid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coursename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'starttime')->widget(DateTimePicker::className(), [
    'language' => 'en',
    'size' => 'ms',
    'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => true,
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        //'maxView' => 1,
        'autoclose' => true,
        //'linkFormat' => 'dd MM yyyy - HH:ii P', // if inline = true
        'format' => 'dd MM yyyy - HH:ii P', // if inline = false
        'todayBtn' => true
    ]
]) ?>

    <?= $form->field($model, 'endtime')->widget(DateTimePicker::className(), [
    'language' => 'en',
    'size' => 'ms',
    'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => true,
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        //'maxView' => 1,
        'autoclose' => true,
        //'linkFormat' => 'dd MM yyyy - HH:ii P', // if inline = true
        'format' => 'dd MM yyyy - HH:ii P', // if inline = false
        'todayBtn' => true
    ]
]) ?>

    <?= $form->field($model, 'totalscore')->textInput() ?>

    <?= $form->field($model, 'totalquestions')->textInput() ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setterid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mattempt')->dropDownList(array(0 => 'Single attempt a Quiz', 1 => 'Multiple attempt a Quiz')) ?>

    <?= $form->field($model, 'option')->dropDownList(array(0 => 'No Jumbling', 1 => 'Jumble options', 2 => 'Jumble questions', 3 => 'Jumble both options and questions')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
