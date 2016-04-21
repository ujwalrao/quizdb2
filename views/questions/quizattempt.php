
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use app\models\user;
use app\models\Presentquiz;
use \russ666\widgets\Countdown;
//use Yii;
use app\models\Results;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\QuestionForm */


$this->title = 'Questions';
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
<div class="questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <div class="col-lg-5">



            <?php
            $date1= date('Y-m-d H:i:s', time()+60*60*5+30*60);
            $diff = max(0,(strtotime($datetime) -strtotime($date1)));
            /*echo strtotime($date1);
            echo " ";
            echo strtotime($datetime);
            echo " ";*/

            echo \russ666\widgets\Countdown::widget([
                'datetime' => date('Y-m-d H:i:s', time()+60*60*5+30*60+$diff),
                'format' => '%D:%H:%M:%S',
                'events' => [
                    'finish' => 'function(){ document.getElementById("form-submit").submit(); }',
                ],
            ]);
            Pjax::begin();

            ?>
            <?php
            $i=0;
            $num=$pagination->totalCount;
            $array=range(0,$num-1);
            //print_r($result);
            //exit();
            if($option==2 || $option==3) {


                if ($result->order != NULL) {
                    $array = unserialize($result->order);
                } else {
                    shuffle($array);
                    $result->order = serialize($array);


                    if (!$result->save(false)) {
                        print_r("err canot");
                        exit();
                    }
                }
            }
             //print_r($array);
            //exit();


            //$questions=new SplFixedArray($noofquestions);

            //for($t=0;$t<$noofquestions;$t++){
              //  $questions[$t]=$t;
           // }
            //$questions=(array)$questions;
            //shuffle($questions);
            //changing working
            foreach($maindata as $value) {
                ?>
                <?php


                if($option==0)
                {
                    $a = "option1";
                    $b = "option2";
                    $c = "option3";
                    $d = "option4";
                    $e = "option5";


                }else if($option==1)  {
                    $numbers = range(1, 5);
                    shuffle($numbers);
                    $a = "option".$numbers[0];
                    $b = "option".$numbers[1];
                    $c = "option".$numbers[2];
                    $d = "option".$numbers[3];
                    $e = "option".$numbers[4];

                }else if($option==2) {
                    $a = "option1";
                    $b = "option2";
                    $c = "option3";
                    $d = "option4";
                    $e = "option5";
                    //$maindata[$i]['questionid']
                    //$con = mysqli_connect("","","","");
                    //$noofquestions = count($maindata);
                    //$qnumbers = range(1, $noofquestions);
                    //shuffle($qnumbers);



                }else if($option==3) {
                    $numbers = range(1, 5);
                    shuffle($numbers);
                    $a = "option".$numbers[0];
                    $b = "option".$numbers[1];
                    $c = "option".$numbers[2];
                    $d = "option".$numbers[3];
                    $e = "option".$numbers[4];

                }









                $default = Presentquiz::find()->where(['quizid'=> $maindata[$i]['quizid'],'questionid'=>$maindata[$i]['questionid'],'userid'=>Yii::$app->user->identity['username']])->one();
                $form = ActiveForm::begin(['id' => 'form-question'.$i,'enableAjaxValidation'=>false,'options' => ['autocomplete' => 'off','onsubmit'=>'return false;','onkeypress'=>'if(event.keyCode==13){send();}']]);
                $o1 = ($default!=NULL&&$default[$a]==1) ? 1 : 0;
                $o2 = ($default!=NULL&&$default[$b]==1) ? 1 : 0;
                $o3 = ($default!=NULL&&$default[$c]==1) ? 1 : 0;
                $o4 = ($default!=NULL&&$default[$d]==1) ? 1 : 0;
                $o5 = ($default!=NULL&&$default[$e]==1) ? 1 : 0;
                ?>
                <?php //echo (string)($i+1).')'; ?>
                 <?= $maindata[$i]['questiontext'] ?>
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
 echo Html::activeHiddenInput($model,'userid',['value'=> 'user'])
                  ;
echo Html::activeHiddenInput($model,'quizid',['value'=> $maindata[$i]['quizid']]) ;

if(!isset($quizid)) {
    $quizid = $maindata[$i]['quizid'];
}
//echo Html::activeHiddenInput($model,'query1',['value'=> $maindata]) ;


                 //echo $form->hiddenField($model,'questionid',array('value'=>$maindata[$questions[$i]]['questionid']));
                //Html::activeHiddenInput($model, 'my_field')
                // $form->field($model, 'questionid',array('value'=>$maindata[$questions[$i]]['questionid']))->hiddenInput()->label(false);


//echo $form->field($model,'questionid',)

  //               echo $form->hiddenField($model,'questionid',['type'=>'hidden','value'=> $maindata[$questions[$i]]['questionid']]);?>

                              <div class="form-group">

                    <?= Html::submitButton('submit', ['class' => 'btn btn-primary', 'name' => 'submit-button', 'onclick'=>'send();']) ?>



                </div>

                <?php ActiveForm::end();
                $i++;
            }
            ?>


        </div>
    </div>


</div>

<?php
            $form = ActiveForm::begin(['id' => 'form-submit','action'=>'index.php?r=questions/submission&id='.$quizid]);
              ?>
              <div class="form-group" id="endtest">

                    <?= Html::submitButton('endtest', ['class' => 'btn btn-primary', 'name' => 'endtest' ]) ?>




                </div>

                <?php ActiveForm::end();

?>

<div class="container">
    <?php
    $value = Presentquiz::find()->where(['quizid'=> $quizid,'userid'=>Yii::$app->user->identity['username']])->all();
   // print_r($value[0]['attempted']);
   // exit();
    $j=$pagination->totalCount;
        $k=1;
    echo '<ul class="pagination">';
        while($k<=$j){
            //print_r($pagination->createUrl($k));

            echo "<li><a href=".$pagination->createUrl($array[$k-1]).">$k</a></li>";
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
    url: "<?php echo Yii::$app->getUrlManager()->createUrl('questions/ajaxattempt').'&id='.$quizid ?>",
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
<?php

            Pjax::end();


            ?>
