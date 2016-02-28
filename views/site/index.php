



<?php

use yii\helpers\Html;
use app\models\Data;
/* @var $this yii\web\View */


?>

<div class="site-index">


    <div class="body-content">
<?php
        if(Yii::$app->user->identity['role']=='student') {
            $url = Data::$url."site/newquiz";
            $this->title = 'My Yii Application';
            echo Html::a('Challenges', $url, ['class' => 'btn btn-success']);
        }

        if(Yii::$app->user->identity['role']=='admin') {
            $url = Data::$url."quiz/index";
            $this->title = 'My Yii Application';
            echo Html::a('Manage-Challenges', $url, ['class' => 'btn btn-success']);
            echo "<br>";
            echo "<br>";
            echo "<br>";

            $url = Data::$url."users/index";
            $this->title = 'My Yii Application';
            echo Html::a('Manage-Users', $url, ['class' => 'btn btn-success']);


        }



?>
    </div>
</div>