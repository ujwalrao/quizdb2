
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Data;
use yii\bootstrap\ActiveForm;
use app\models\user;
use app\models\Virtualquiz;
use \russ666\widgets\Countdown;
use app\models\Questions;


$this->title = $queryresult->quizname;
//$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' =>  Data::$url."questions&id=".$id];
$this->params['breadcrumbs'][] = $this->title;
?>


<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        ul.pagination li a.active {
            background-color: #4CAF50;
            color: white;
        }
        <</style>
</head>
<div class="virtual-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <div class="col-lg-5">



            <?php

            ?>
            <?php
            $i=0;
            $num=$pagination->totalCount;
            $array=range(0,$num-1);
            //print_r($result);
            //exit();

            //print_r($array);
            //exit();


            //$virtual=new SplFixedArray($noofvirtual);

            //for($t=0;$t<$noofvirtual;$t++){
            //  $virtual[$t]=$t;
            // }
            //$virtual=(array)$virtual;
            //shuffle($virtual);
            //changing working
            foreach($maindata as $value) {
                ?>
                <?php



                $a = "option1";
                $b = "option2";
                $c = "option3";
                $d = "option4";
                $e = "option5";










                $default = Virtualquiz::find()->where(['quizid'=> $maindata[$i]['quizid'],'questionid'=>$maindata[$i]['questionid'],'userid'=>Yii::$app->user->identity['username']])->one();
                
                //print_r($default);
                //exit();
                $form = ActiveForm::begin(['id' => 'form-question'.$i,'enableAjaxValidation'=>false,'options' => ['autocomplete' => 'off','onsubmit'=>'return false;','onkeypress'=>'if(event.keyCode==13){send();}']]);
                $o1 = ($default!=NULL&&$default[$a]==1) ? 1 : 0;
                $o2 = ($default!=NULL&&$default[$b]==1) ? 1 : 0;
                $o3 = ($default!=NULL&&$default[$c]==1) ? 1 : 0;
                $o4 = ($default!=NULL&&$default[$d]==1) ? 1 : 0;
                $o5 = ($default!=NULL&&$default[$e]==1) ? 1 : 0;
                ?>
                <?php //echo (string)($i+1).')'; ?>
                <div class="container">
                    <div class="boxed"style= background-color:#f2f2f2;' >
                        <?= "<p class='bg-primary'>".$maindata[$i]['questiontext']."</p>" ?>
                    </div>
                </div>
                <?php
                //$model->questionid=$maindata[$i]['questionid'];
                echo "<br>";
                if($maindata[$i]['image']!= "no image") {

                    echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$maindata[$i]['image'].'" width="90px">&nbsp; &nbsp; &nbsp; ';

                }
                //echo "a";
                if($maindata[$i][$a]!=NULL){
                    // echo "a)";
                    if($o1) {
                        $model->{$a} = true;
                        echo $form->field($model, $a)->checkbox(['checked' =>"",'label' => 'a)'. $maindata[$i][$a]]);
                    }
                    else
                        echo $form->field($model, $a)->checkbox(["id" => $a ,'label' => 'a) '. $maindata[$i][$a]]);
                }
                if($maindata[$i][$b]!=NULL){
                    //echo "b)";
                    if($o2) {
                        $model->{$b} = true;
                        echo $form->field($model, $b)->checkbox(['checked' =>"",'label' => 'b)'. $maindata[$i][$b]]);
                    }
                    else
                        echo $form->field($model, $b)->checkbox(["id" => $b ,'label' => 'b) '. $maindata[$i][$b]]);
                }
                if($maindata[$i][$c]!=NULL){
                    //echo "c)";
                    if($o3) {
                        $model->{$c} = true;
                        echo $form->field($model, $c)->checkbox(['checked' =>"",'label' => 'c)'. $maindata[$i][$c]]);
                    }
                    else
                        echo $form->field($model, $c)->checkbox(["id" => $c ,'label' => 'c) '. $maindata[$i][$c]]);
                }
                if($maindata[$i][$d]!=NULL){
                    //echo "d)";
                    if($o4) {
                        $model->{$d} = true;
                        echo $form->field($model, $d)->checkbox(['checked' =>"",'label' => 'd)'. $maindata[$i][$d]]);
                    }
                    else
                        echo $form->field($model, $d)->checkbox(["id" => $d ,'label' => 'd) '. $maindata[$i][$d]]);
                }
                if($maindata[$i][$e]!=NULL){
                    // echo "e)";
                    if($o5) {
                        $model->{$e} = true;
                        echo $form->field($model, $e)->checkbox(['checked' =>"",'label' => 'e)'. $maindata[$i][$e]]);
                    }
                    else
                        echo $form->field($model, $e)->checkbox(["id" => $e ,'label' => 'e) '. $maindata[$i][$e]]);
                }


                echo Html::activeHiddenInput($model,'questionid',['value'=> $maindata[$i]['questionid']]) ;

                echo Html::activeHiddenInput($model,'userid',['value'=> Yii::$app->user->identity['username']])
                ;
                echo Html::activeHiddenInput($model,'quizid',['value'=> $maindata[$i]['quizid']]) ;

                if(!isset($quizid)) {
                    $quizid = $maindata[$i]['quizid'];
                }
//echo Html::activeHiddenInput($model,'query1',['value'=> $maindata]) ;


                //echo $form->hiddenField($model,'questionid',array('value'=>$maindata[$virtual[$i]]['questionid']));
                //Html::activeHiddenInput($model, 'my_field')
                // $form->field($model, 'questionid',array('value'=>$maindata[$virtual[$i]]['questionid']))->hiddenInput()->label(false);


//echo $form->field($model,'questionid',)

                //               echo $form->hiddenField($model,'questionid',['type'=>'hidden','value'=> $maindata[$virtual[$i]]['questionid']]);?>

                <div class="form-group">

                    <?php // Html::submitButton('submit', ['class' => 'btn btn-primary', 'name' => 'submit-button', 'onclick'=>'send();']) ?>



                </div>

                <?php ActiveForm::end();
                $i++;
            }
            ?>


        </div>
    </div>


</div>
<?php
$c=$pagination->getpage()+1;
echo "correct options: <br><br>";
$inc=1;
$char=range('a', 'e');



while($inc<=5){
    $name='weight'.$inc;
    if($queryques[$c][$name]>0){
        $nameop='option'.$inc;
        echo $char[$inc-1].')  ';
        echo $queryques[$c][$nameop]."<br><br>";
    }
    $inc++;
}
echo "<br> <br>";
echo "Solution: <br><br>";
?>


<div class="container">
    <div class="boxed"style= background-color:#f2f2f2;' >
        <?= "<p class='bg-primary'>".$queryques[$c]['solution']."</p>" ?>
    </div>
</div>


<?php
//echo $queryques[$c]['solution'];
?>


<div class="container">
    <?php
    $value = Virtualquiz::find()->where(['quizid'=> $quizid,'userid'=>Yii::$app->user->identity['username']])->all();
    // print_r($value[0]['attempted']);
    // exit();
    $j=$pagination->totalCount;
    $k=1;
    echo '<ul class="pagination">';
    while($k<=$j){
        //print_r($pagination->createUrl($k));

        echo "<li><a href=".$pagination->createUrl($k-1).">$k</a></li>";

        $k++;
    }
    echo '</ul>';


    ?>

</div>
<?php
//echo  LinkPager::widget(['pagination' => $pagination]) ?>


<script type="text/javascript">
    function activate()
    {

    }
    function send()
    {

        var data=$("#form-question0").serialize();

        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::$app->getUrlManager()->createUrl('virtual/ajaxattempt').'&id='.$quizid ?>",
            data:data,
            success:function(data){
                //$.pjax.reload({container:'#form-question'});

            },
            error: function(data) { // if error occured
                alert("Error occured.please try again");
                console.log(data);
            },

            dataType:'html'
        });

    }

</script>


