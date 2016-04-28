<?php

namespace app\controllers;
use app\models\Data;
use app\models\Virtualquiz;
use app\models\QuestionForm;
use app\models\Quizsetter;
use Yii;
use app\models\Questions;
use app\models\Questionssearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use app\models\Results;
use app\models\Quiz;
use yii\db\Expression;
use yii\web\UploadedFile;

class VirtualController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }



    public function actionAjaxattempt($id)
    {
        //return 'cjeck';
        $model = new Virtualquiz();

        //$model=$this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $temp=Yii::$app->request->post();
            $temp = $temp['Virtualquiz'];
            $model->option1 = $temp['option1'];
            $model->option2 = $temp['option2'];
            $model->option3 = $temp['option3'];
            $model->option4 = $temp['option4'];
            $model->option5 = $temp['option5'];

            $model->userid=Yii::$app->user->identity['username'];
            $model->attempted=1;
            $model->quizid=$id;
            $model->questionid=$temp['questionid'];

            if ($model->validate()) {

                $query1 = Questions::find()->where(['quizid' => $id]);

                $pagination = new Pagination([
                    'defaultPageSize' => 1,
                    'totalCount' => $query1->count(),
                ]);
                //print_r($pagination->offset);
                //exit();
                //$pagination->setPage(1);
                $query1 = $query1->offset($pagination->offset)->limit($pagination->limit)->all();

                $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();
                if($query2!=NULL){
                    $query2->delete();
                }

                $model->save();

            }
        }

        $out['status'] = "success";
        $out['val'] = '';
        json_encode($out,TRUE);

    }


    public function actionVirtualattempt($id)
    {

        $username=Yii::$app->user->identity['username'];
        $tuple=Quiz::find()->where(['quizid'=>$id])->one();
        





        $model = new Virtualquiz();
        //$model=$this->findModel($id);





        if ($model->load(Yii::$app->request->post())) {
            $temp=Yii::$app->request->post();
            $temp = $temp['Virtualquiz'];
            $model->option1 = $temp['option1'];
            $model->option2 = $temp['option2'];
            $model->option3 = $temp['option3'];
            $model->option4 = $temp['option4'];
            $model->option5 = $temp['option5'];

            $model->userid=Yii::$app->user->identity['username'];
            $model->attempted=1;
            $model->quizid=$id;
            $model->questionid=$temp['questionid'];
            //exit();
            if ($model->validate()) {
                //$query1=$tem['query1'];
                //       $query1 = Questions::find()->where(['quizid' => $id]);
                //$query1 = (object) json_decode(base64_decode($_POST['info']));

                $query1 = Questions::find()->where(['quizid' => $id]);
                //         $query1=Data::$query1;

                $pagination = new Pagination([
                    'defaultPageSize' => 1,
                    'totalCount' => $query1->count(),
                ]);

                // print_r($pagination->offset);
                //             exit();
//$pagination->setPage(1);
                $query1 = $query1->offset($pagination->offset)->limit($pagination->limit)->all();




                //            $model->attempted=1;

//            print_r($model);
//exit();


                $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();
                if($query2!=NULL){
                    $query2->delete();
                }

                $model->save();
                $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();

                $date=Quiz::find()->where(['quizid'=>$id])->one();
                $date=$date['endtime'];
                $datetime=$date;


                return $this->render('virtualattempt', [
                    'maindata' => $query1,
                    'model' => $model,
                    'default' => $query2,
                    'datetime'=>$date,
                    'option' => $tuple['options'],
                    'pagination' => $pagination,
                    'result' =>$result,
                    'number'=>$number,
                ]);



                // form inputs are valid, do something here
            }
            /* if ($result = $model->upload()) {
                 $query1 = Questions::find()->where(['quizid' => $id])->asArray()->all();


                 return $this->render('virtualattempt', [
                     'maindata' => $query1,
                     'model' => $model,

                 ]);

             }
             else{
                 print_r($model);
                 exit();
             }
            */
        }
        if(array_key_exists( 'endtest',Yii::$app->request->post())){
            $query1 = Virtualquiz::find()->indexBy('questionid')->where(['quizid' => $id,'userid'=>Yii::$app->user->identity['username']])->asArray()->all();
            $query2= Questions::find()->indexBy('questionid')->where(['quizid'=>$id])->asArray()->all();

            //print_r($query1);
            //exit();


            $score=0;
            $correct=0;
            $wrong=0;

            foreach ($query1 as $key => $value) {
                $ans=0;
                $flag=0;

                if(  $value['option1']==1)
                {
                    if($query2[$key]['weight1']<0 )
                        $flag=$query2[$key]['weight1'];
                }

                $ans+=$query2[$key]['weight1']*$value['option1'];

                if($query2[$key]['weight2']<0 && $value['option2']==1 )
                {
                    $flag=$query2[$key]['weight2'];
                }

                $ans+=$query2[$key]['weight2']*$value['option2'];

                if($query2[$key]['weight3']<0 && $value['option3']==1 )
                {
                    $flag=$query2[$key]['weight3'];
                }

                $ans+=$query2[$key]['weight3']*$value['option3'];

                if($query2[$key]['weight4']<0 && $value['option4']==1 )
                {
                    $flag=$query2[$key]['weight4'];
                }

                $ans+=$query2[$key]['weight4']*$value['option4'];

                if($query2[$key]['weight5']<0 && $value['option5']==1 )
                {
                    $flag=$query2[$key]['weight5'];
                }

                $ans+=$query2[$key]['weight5']*$value['option5'];

                if($flag!=0){
                    $ans=$flag;
                }
                if($ans>0){
                    $correct++;
                }
                else{
                    $wrong++;
                }
                $tem = Virtualquiz::find()->where(['questionid'=>$key,'userid'=>Yii::$app->user->identity['username'],'quizid'=>$id])->one();
                $tem->attempted=$ans;
                $tem->update();


                $score=$score+$ans;


            }

            $queryquiz = Quiz::find()->where(['quizid'=>$id])->one();
            $queryresult=new Results;
            $queryresult->totalscore=$queryquiz->totalscore;
            $queryresult->obtainedscore=$score;
            $queryresult->totalquestions=$queryquiz->totalquestions;
            $queryresult->correctattempted=$correct;
            $queryresult->wrongattempted=$wrong;
            $queryresult->quizname=$queryquiz->quizname;

            $queryresult->userid=Yii::$app->user->identity['username'];
            $queryresult->quizid=$id;

            //print($score);
            //exit();
            return $this->render('submission', [
                'queryresult' => $queryresult,
            ]);




        }
        else {






            $query1 = Questions::find()->where(['quizid' => $id]);


            $number=count($query1->all());

            $pagination = new Pagination([
                'defaultPageSize' => 1,
                'totalCount' => $query1->count(),
            ]);

            //print_r($pagination->offset);
            //exit();
//$pagination->setPage(1);
            $query1 = $query1->offset($pagination->offset)->limit($pagination->limit)->all();
            //Data::$query1=$query1;
            //print_r($query1);
            //exit();

            //print_r($query1);
            //         exit();

            $date=Quiz::find()->where(['quizid'=>$id])->one();
            $date=$date['endtime'];


            return $this->render('virtualattempt', [
                'maindata' => $query1,
                'model' => $model,
                'datetime'=>$date,
                'option' => $tuple['option'],
                'pagination' => $pagination,
                //'result' =>$result,
                'number'=>$number,

            ]);
        }
    }

    public function actionSolutions($id)
    {

        print_r($id);
        $model = new Virtualquiz();
        $query1 = Virtualquiz::find()->indexBy('questionid')->where(['quizid' => $id,'userid'=>Yii::$app->user->identity['username']])->asArray()->all();
        $query2= Questions::find()->indexBy('questionid')->where(['quizid'=>$id])->asArray()->all();
        $queryques=$query2;
        //print_r($query1);
        //exit();


        $score=0;
        $correct=0;
        $wrong=0;

        foreach ($query1 as $key => $value) {
            $ans=0;
            $flag=0;

            if(  $value['option1']==1)
            {
                if($query2[$key]['weight1']<0 )
                    $flag=$query2[$key]['weight1'];
            }

            $ans+=$query2[$key]['weight1']*$value['option1'];

            if($query2[$key]['weight2']<0 && $value['option2']==1 )
            {
                $flag=$query2[$key]['weight2'];
            }

            $ans+=$query2[$key]['weight2']*$value['option2'];

            if($query2[$key]['weight3']<0 && $value['option3']==1 )
            {
                $flag=$query2[$key]['weight3'];
            }

            $ans+=$query2[$key]['weight3']*$value['option3'];

            if($query2[$key]['weight4']<0 && $value['option4']==1 )
            {
                $flag=$query2[$key]['weight4'];
            }

            $ans+=$query2[$key]['weight4']*$value['option4'];

            if($query2[$key]['weight5']<0 && $value['option5']==1 )
            {
                $flag=$query2[$key]['weight5'];
            }

            $ans+=$query2[$key]['weight5']*$value['option5'];

            if($flag!=0){
                $ans=$flag;
            }
            if($ans>0){
                $correct++;
            }
            else{
                $wrong++;
            }
            $tem = Virtualquiz::find()->where(['questionid'=>$key,'userid'=>Yii::$app->user->identity['username'],'quizid'=>$id])->one();
            $tem->attempted=$ans;
            $tem->update();


            $score=$score+$ans;


        }

        $queryquiz = Quiz::find()->where(['quizid'=>$id])->one();
        $queryresult=new Results;
        $queryresult->totalscore=$queryquiz->totalscore;
        $queryresult->obtainedscore=$score;
        $queryresult->totalquestions=$queryquiz->totalquestions;
        $queryresult->correctattempted=$correct;
        $queryresult->wrongattempted=$wrong;
        $queryresult->quizname=$queryquiz->quizname;
        $userid=Yii::$app->user->identity['username'];
        $queryresult->userid=Yii::$app->user->identity['username'];
        $queryresult->quizid=$id;

                //print($queryresult->quizname);
        //exit();










        $query1 = Questions::find()->where(['quizid' => $id]);
        //         $query1=Data::$query1;

        $pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $query1->count(),
        ]);

        // print_r($pagination->offset);
        //             exit();
//$pagination->setPage(1);
        $query1 = $query1->offset($pagination->offset)->limit($pagination->limit)->all();




        //            $model->attempted=1;

//            print_r($model);
//exit();


        $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();
        if($query2!=NULL){
            $query2->delete();
        }


        $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();

        $date=Quiz::find()->where(['quizid'=>$id])->one();
        $date=$date['endtime'];
        $datetime=$date;

/*
        return $this->render('virtualattempt', [

            'option' => $tuple['options'],

            'result' =>$result,
        ]);
*/









        return $this->render('solutions', [
            'queryques'=>$queryques,
            'queryresult' => $queryresult,
            'id'=>$id,
            'maindata' => $query1,
            'model' => $model,
            'pagination' => $pagination,
            'default' => $query2,
            'datetime'=>$date,


        ]);
    }

    public function actionDisplay($id)
    {

        print_r($id);
        $model = new Virtualquiz();
        $query1 = Virtualquiz::find()->indexBy('questionid')->where(['quizid' => $id,'userid'=>Yii::$app->user->identity['username']])->asArray()->all();
        $query2= Questions::find()->indexBy('questionid')->where(['quizid'=>$id])->asArray()->all();
        $queryques=$query2;
        //print_r($query1);
        //exit();


        $score=0;
        $correct=0;
        $wrong=0;

        foreach ($query1 as $key => $value) {
            $ans=0;
            $flag=0;

            if(  $value['option1']==1)
            {
                if($query2[$key]['weight1']<0 )
                    $flag=$query2[$key]['weight1'];
            }

            $ans+=$query2[$key]['weight1']*$value['option1'];

            if($query2[$key]['weight2']<0 && $value['option2']==1 )
            {
                $flag=$query2[$key]['weight2'];
            }

            $ans+=$query2[$key]['weight2']*$value['option2'];

            if($query2[$key]['weight3']<0 && $value['option3']==1 )
            {
                $flag=$query2[$key]['weight3'];
            }

            $ans+=$query2[$key]['weight3']*$value['option3'];

            if($query2[$key]['weight4']<0 && $value['option4']==1 )
            {
                $flag=$query2[$key]['weight4'];
            }

            $ans+=$query2[$key]['weight4']*$value['option4'];

            if($query2[$key]['weight5']<0 && $value['option5']==1 )
            {
                $flag=$query2[$key]['weight5'];
            }

            $ans+=$query2[$key]['weight5']*$value['option5'];

            if($flag!=0){
                $ans=$flag;
            }
            if($ans>0){
                $correct++;
            }
            else{
                $wrong++;
            }
            $tem = Virtualquiz::find()->where(['questionid'=>$key,'userid'=>Yii::$app->user->identity['username'],'quizid'=>$id])->one();
            $tem->attempted=$ans;
            $tem->update();


            $score=$score+$ans;


        }

        $queryquiz = Quiz::find()->where(['quizid'=>$id])->one();
        $queryresult=new Results;
        $queryresult->totalscore=$queryquiz->totalscore;
        $queryresult->obtainedscore=$score;
        $queryresult->totalquestions=$queryquiz->totalquestions;
        $queryresult->correctattempted=$correct;
        $queryresult->wrongattempted=$wrong;
        $queryresult->quizname=$queryquiz->quizname;
        $userid=Yii::$app->user->identity['username'];
        $queryresult->userid=Yii::$app->user->identity['username'];
        $queryresult->quizid=$id;

                //print($queryresult->quizname);
        //exit();










        $query1 = Questions::find()->where(['quizid' => $id]);
        //         $query1=Data::$query1;

        $pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $query1->count(),
        ]);

        // print_r($pagination->offset);
        //             exit();
//$pagination->setPage(1);
        $query1 = $query1->offset($pagination->offset)->limit($pagination->limit)->all();




        //            $model->attempted=1;

//            print_r($model);
//exit();


        $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();
        if($query2!=NULL){
            $query2->delete();
        }


        $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();

        $date=Quiz::find()->where(['quizid'=>$id])->one();
        $date=$date['endtime'];
        $datetime=$date;

/*
        return $this->render('virtualattempt', [

            'option' => $tuple['options'],

            'result' =>$result,
        ]);
*/









        return $this->render('display', [
            'queryques'=>$queryques,
            'queryresult' => $queryresult,
            'id'=>$id,
            'maindata' => $query1,
            'model' => $model,
            'pagination' => $pagination,
            'default' => $query2,
            'datetime'=>$date,


        ]);
    }

    public function actionSubmission($id)
    {
        print_r($id);
        $model = new Virtualquiz();
        $query1 = Virtualquiz::find()->indexBy('questionid')->where(['quizid' => $id,'userid'=>Yii::$app->user->identity['username']])->asArray()->all();
        $query2= Questions::find()->indexBy('questionid')->where(['quizid'=>$id])->asArray()->all();
        $queryques=$query2;
        //print_r($query1);
        //exit();


        $score=0;
        $correct=0;
        $wrong=0;

        foreach ($query1 as $key => $value) {
            $ans=0;
            $flag=0;

            if(  $value['option1']==1)
            {
                if($query2[$key]['weight1']<0 )
                    $flag=$query2[$key]['weight1'];
            }

            $ans+=$query2[$key]['weight1']*$value['option1'];

            if($query2[$key]['weight2']<0 && $value['option2']==1 )
            {
                $flag=$query2[$key]['weight2'];
            }

            $ans+=$query2[$key]['weight2']*$value['option2'];

            if($query2[$key]['weight3']<0 && $value['option3']==1 )
            {
                $flag=$query2[$key]['weight3'];
            }

            $ans+=$query2[$key]['weight3']*$value['option3'];

            if($query2[$key]['weight4']<0 && $value['option4']==1 )
            {
                $flag=$query2[$key]['weight4'];
            }

            $ans+=$query2[$key]['weight4']*$value['option4'];

            if($query2[$key]['weight5']<0 && $value['option5']==1 )
            {
                $flag=$query2[$key]['weight5'];
            }

            $ans+=$query2[$key]['weight5']*$value['option5'];

            if($flag!=0){
                $ans=$flag;
            }
            if($ans>0){
                $correct++;
            }
            else{
                $wrong++;
            }
            $tem = Virtualquiz::find()->where(['questionid'=>$key,'userid'=>Yii::$app->user->identity['username'],'quizid'=>$id])->one();
            $tem->attempted=$ans;
            $tem->update();


            $score=$score+$ans;


        }

        $queryquiz = Quiz::find()->where(['quizid'=>$id])->one();
        $queryresult=new Results;
        $queryresult->totalscore=$queryquiz->totalscore;
        $queryresult->obtainedscore=$score;
        $queryresult->totalquestions=$queryquiz->totalquestions;
        $queryresult->correctattempted=$correct;
        $queryresult->wrongattempted=$wrong;
        $queryresult->quizname=$queryquiz->quizname;
        $userid=Yii::$app->user->identity['username'];
        $queryresult->userid=Yii::$app->user->identity['username'];
        $queryresult->quizid=$id;

                //print($queryresult->quizname);
        //exit();










        $query1 = Questions::find()->where(['quizid' => $id]);
        //         $query1=Data::$query1;

        $pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $query1->count(),
        ]);

        // print_r($pagination->offset);
        //             exit();
//$pagination->setPage(1);
        $query1 = $query1->offset($pagination->offset)->limit($pagination->limit)->all();




        //            $model->attempted=1;

//            print_r($model);
//exit();


        $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();
        if($query2!=NULL){
            $query2->delete();
        }


        $query2=Virtualquiz::find()->where(['quizid'=> $id,'questionid'=>$model->questionid,'userid'=>$model->userid])->one();

        $date=Quiz::find()->where(['quizid'=>$id])->one();
        $date=$date['endtime'];
        $datetime=$date;

/*
        return $this->render('virtualattempt', [

            'option' => $tuple['options'],

            'result' =>$result,
        ]);
*/









        return $this->render('submission', [
            'queryques'=>$queryques,
            'queryresult' => $queryresult,
            'id'=>$id,
            'maindata' => $query1,
            'model' => $model,
            'pagination' => $pagination,
            'default' => $query2,
            'datetime'=>$date,


        ]);

    }


}
