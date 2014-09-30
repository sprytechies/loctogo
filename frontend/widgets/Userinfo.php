<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;


class Userinfo  extends Widget{
    //put your code here
    public function run()
        {
                return $this->render('userinfo');
        }

}
