<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Questions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questions-form">


    <?php $form = ActiveForm::begin(); ?>

    <?php // echo  $form->field($model, 'quizid')->textInput() ?>
    <?= Html::activeHiddenInput($model,'quizid',['value'=> $id]) ;?>

    <?php echo $form->field($model, 'questionid')->textInput() ?>

    <?= $form->field($model, 'questiontext')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noofoptions')->textInput() ?>

    <?= $form->field($model, 'option1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight1')->textInput() ?>

    <?= $form->field($model, 'weight2')->textInput() ?>

    <?= $form->field($model, 'weight3')->textInput() ?>

    <?= $form->field($model, 'weight4')->textInput() ?>

    <?= $form->field($model, 'weight5')->textInput() ?>

    <?= $form->field($model, 'maq')->textInput() ?>

    <?= $form->field($model, 'saq')->textInput() ?>

    <?= $form->field($model, 'essay')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
