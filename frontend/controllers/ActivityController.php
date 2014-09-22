<?php

namespace frontend\controllers;

use common\models\Todo;
use common\models\Comments;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\ArrayDataProvider;
class ActivityController extends \yii\web\Controller
{
    public $layout = 'column2';
    
    public function actionIndex($id)
        {
          $text= new Comments;
          $sql="select description,cdate from todo where idtodo=".$id;
          $model=  Todo::findBySql($sql)->one();
          $query = new Query();
          $provider = new ArrayDataProvider([
          'allModels' => $query->from('comments')->all(),
        ]);
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
