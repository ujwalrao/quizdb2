<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\ckeditor\CKEditor;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Questions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questions-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?php // echo  $form->field($model, 'quizid')->textInput() ?>
    <?= Html::activeHiddenInput($model,'quizid',['value'=> $id]) ;?>

    <?php echo $form->field($model, 'questionid')->textInput() ?>

    <?php //echo $form->field($model, 'questiontext')->textarea(['rows' => 6]) ?>

    <?php
    echo $form->field($model, 'questiontext')->widget(CKEditor::className(),[
    'editorOptions' => [
    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    'inline' => false, //по умолчанию false
    ],
    ]);
?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?php 
    if($model->image) {
        echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$model->image.'" width="90px">&nbsp; &nbsp; &nbsp; ';
        
    }
    ?>


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

    <?= $form->field($model, 'solution')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
