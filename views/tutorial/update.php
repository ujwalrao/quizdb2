<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tutorials */

$this->title = 'Update Tutorials: ' . ' ' . $model->tutorialid;
$this->params['breadcrumbs'][] = ['label' => 'Tutorials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tutorialid, 'url' => ['view', 'id' => $model->tutorialid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tutorials-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
