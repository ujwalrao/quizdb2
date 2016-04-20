<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Data;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Userssearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php $url = Data::$url."site/signup";

        echo Html::a('Create-user', $url, ['class' => 'btn btn-success']);
       ?>
    </p>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

    <?php ActiveForm::end() ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'role',
            [
                'label'=>'Change Password',
                'format'=>'raw',
                'value' => function($data){
                    $url = Data::$url."site/resetpass&username=".$data['username'];
                    return Html::a('Reset Password', $url, ['class' => 'btn btn-success']);
                }
            ],
            //'auth_key',
            //'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
