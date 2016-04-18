<?php

use yii\helpers\Html;
use app\models\Data;

/* @var $this yii\web\View */
/* @var $model app\models\Questions */

$this->title = 'Update Questions: ' . ' ' . $model->quizid;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' =>  Data::$url."questions/index&id=".$id];
$this->params['breadcrumbs'][] = ['label' => $model->quizid, 'url' => ['view', 'quizid' => $model->quizid, 'questionid' => $model->questionid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    	'id'=>$model->quizid,
        'model' => $model,
    ]) ?>

</div>
