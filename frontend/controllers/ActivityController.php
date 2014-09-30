<?php

namespace frontend\controllers;

use common\models\Todo;
use common\models\Comments;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\data\SqlDataProvider;

class ActivityController extends \yii\web\Controller {

    public $layout = 'column2';

    public function actionIndex($id) {
        $text = new Comments;
        $model = Todo::find()->where(['idtodo' => $id])->one();
        $provider = new ActiveDataProvider([
            'query' => Comments::find()->with('iduser0'),
        ]);

        function replyComments($idcomments) {
            $data = Comments::find()->with('iduser0')->where(['parent' => $idcomments])->all();
            foreach ($data as $val) {
                echo "<u>" . $val['iduser0']['username'] . "</u> replied<br/>" . "<b>" . $val['description'] . "</b><br/>";
            }
        }

        return $this->render('index', ['model' => $model, 'text' => $text, 'dataprovider' => $provider]);
    }

    public function actionComment() {
        $frm = new Comments;
        if ($frm->load(Yii::$app->request->post())) {
            //TODO: this is considered as given
            $frm->idtodo = 1;
            $frm->iduser = Yii::$app->user->id;
            if ($frm->save())
                echo "success";
            else
                print_r($frm->getErrors());
        }
    }

}
