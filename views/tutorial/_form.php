<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Tutorials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutorials-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quizid')->textInput() ?>

    <?= $form->field($model, 'tutorialid')->textInput() ?>




    <?= $form->field($model, 'file')->fileInput() ?>
    <?php

    ?>

    <?= $form->field($model, 'tutorialname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coursename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'courseid')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'tutorialtext')->textarea(['rows' => 6]) ?>


    <?php
    echo $form->field($model, 'tutorialtext')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
