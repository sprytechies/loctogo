<?php

namespace frontend\controllers;

use common\models\Todo;
use common\models\Comments;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;


class ActivityController extends \yii\web\Controller
{
         public $layout = 'column2';
         
    public function actionIndex($id)
    {
          $text= new Comments;
          $sql="select description,cdate from todo where idtodo=".$id;
          $model=  Todo::findBySql($sql)->one();
          $query = new Query();
          //$condition="select * from comments where parent=".NULL;
          $provider = new ActiveDataProvider([
          'query' => Comments::find()->with('iduser0'),
        ]);
           
        function replyComments($idcomments)
        {
            $model = Yii::$app->db->createCommand("SELECT c.description, u.username FROM comments c inner join user u where parent=$idcomments and c.iduser=u.id");
	    $users = $model->queryAll();
           foreach ($users as $val){
            echo "<u>".$val['username']."</u> replied<br/>"."<b>".$val['description']."</b><br/>";
           }
        }
        return $this->render('index',['model'=>$model,'text'=>$text,'dataprovider'=>$provider]);
       
    }
        
    public function actionComment()
    {
             $frm=new Comments;
            if($frm->load(Yii::$app->request->post()))
            {
               
                $frm->idtodo = 1;
                $frm->iduser = Yii::$app->user->id;
                if($frm->save())
                    echo "success";
                else
                    print_r($frm->getErrors());
            }
            
    }

}
