<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use app\models\user;
use app\models\Presentquiz;
use \russ666\widgets\Countdown;
use Yii;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\QuestionForm */


$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <div class="col-lg-5">



            <?php
            $date1= date('Y-m-d H:i:s', time()+60*60*5+30*60);
            $diff = abs(strtotime($date1) - strtotime($datetime));
            //echo $diff;
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
            //$noofquestions=count($maindata);
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
                $default = Presentquiz::find()->where(['quizid'=> $maindata[$i]['quizid'],'questionid'=>$maindata[$i]['questionid'],'userid'=>Yii::$app->user->identity['username']])->one();
                $form = ActiveForm::begin(['id' => 'form-question'.$i,'enableAjaxValidation'=>false,'options' => ['autocomplete' => 'off','onsubmit'=>'return false;','onkeypress'=>'if(event.keyCode==13){send();}']]);
                $o1 = ($default!=NULL&&$default['option1']==1) ? 1 : 0;
                $o2 = ($default!=NULL&&$default['option2']==1) ? 1 : 0;
                $o3 = ($default!=NULL&&$default['option3']==1) ? 1 : 0;
                $o4 = ($default!=NULL&&$default['option4']==1) ? 1 : 0;
                $o5 = ($default!=NULL&&$default['option5']==1) ? 1 : 0;
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
                if($maindata[$i]['option1']!=NULL){
                   // echo "a)";
                  if($o1) {
                    $model->option1 = true;
                    echo $form->field($model, 'option1')->checkbox(['checked' =>"",'label' => 'a)'. $maindata[$i]['option1']]);
                  }
                  else
                    echo $form->field($model, 'option1')->checkbox(["id" => "option1" ,'label' => 'a) '. $maindata[$i]['option1']]);
                }
                if($maindata[$i]['option2']!=NULL){
                    //echo "b)";
                    if($o2) {
                      $model->option2 = true;
                      echo $form->field($model, 'option2')->checkbox(['checked' =>"",'label' => 'b)'. $maindata[$i]['option2']]);
                    }
                    else
                      echo $form->field($model, 'option2')->checkbox(["id" => "option2" ,'label' => 'b) '. $maindata[$i]['option2']]);
                }
                if($maindata[$i]['option3']!=NULL){
                    //echo "c)";
                    if($o3) {
                      $model->option3 = true;
                      echo $form->field($model, 'option3')->checkbox(['checked' =>"",'label' => 'c)'. $maindata[$i]['option3']]);
                    }
                    else
                      echo $form->field($model, 'option3')->checkbox(["id" => "option3" ,'label' => 'c) '. $maindata[$i]['option3']]);
                }
                if($maindata[$i]['option4']!=NULL){
                    //echo "d)";
                    if($o4) {
                      $model->option4 = true;
                      echo $form->field($model, 'option4')->checkbox(['checked' =>"",'label' => 'd)'. $maindata[$i]['option4']]);
                    }
                    else
                      echo $form->field($model, 'option4')->checkbox(["id" => "option4" ,'label' => 'd) '. $maindata[$i]['option4']]);
                }
                if($maindata[$i]['option5']!=NULL){
                   // echo "e)";
                   if($o5) {
                     $model->option5 = true;
                     echo $form->field($model, 'option5')->checkbox(['checked' =>"",'label' => 'e)'. $maindata[$i]['option5']]);
                   }
                   else
                     echo $form->field($model, 'option5')->checkbox(["id" => "option5" ,'label' => 'e) '. $maindata[$i]['option5']]);
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

<?php // LinkPager::widget(['pagination' => $pagination]) ?>

<script type="text/javascript">

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
