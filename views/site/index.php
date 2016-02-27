



<?php

use yii\helpers\Html;
/* @var $this yii\web\View */


?>

<div class="site-index">


    <div class="body-content">
<?php
        if(Yii::$app->user->identity['role']=='student') {
            $url = "http://localhost/quizdb2/web/index.php?r=site/newquiz";
            $this->title = 'My Yii Application';
            echo Html::a('Challenges', $url, ['class' => 'btn btn-success']);
        }

        if(Yii::$app->user->identity['role']=='admin') {
            $url = "http://localhost/quizdb2/web/index.php?r=quiz/index";
            $this->title = 'My Yii Application';
            echo Html::a('Manage-Challenges', $url, ['class' => 'btn btn-success']);
            echo "<br>";
            echo "<br>";
            echo "<br>";

            $url = "http://localhost/quizdb2/web/index.php?r=users/index";
            $this->title = 'My Yii Application';
            echo Html::a('Manage-Users', $url, ['class' => 'btn btn-success']);


        }



?>
    </div>
</div>