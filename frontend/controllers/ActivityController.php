<?php

namespace frontend\controllers;
use frontend\components\Controller;
class ActivityController extends Controller
{
    public $layout = 'column2';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
