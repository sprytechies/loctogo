<?php

namespace frontend\controllers;
use frontend\components\Controller;
class DashboardController extends Controller
{
    public $layout = 'column2';
    public function actionIndex($id)
    {
        return $this->render('index');
    }

}
