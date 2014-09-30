<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;


class Searchpanel  extends Widget{
    //put your code here
    public function run()
        {
                return $this->render('searchpanel');
        }

}
