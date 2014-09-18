<?php

namespace frontend\controllers;
use frontend\components\Controller;
class DashboardController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
