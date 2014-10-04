<?php

namespace frontend\controllers;

use frontend\components\Controller;
use common\models\Todo;
use Yii;

class DashboardController extends Controller {

    public $layout = 'column2';

    public function actionIndex($id, $limit = 2) {
        $model = Todo::find()->limit($limit)->with('idcities0')->all();
        if (!\Yii::$app->request->getIsAjax()) {
            return $this->render('index', ['model' => $model, 'limit' => $limit]);
        } else {
            return $this->renderAjax('_form', ['model' => $model, 'limit' => $limit]);
        }
    }

}
