<?php

namespace frontend\components;
use common\models\Analytics;
use Yii;
class TrackRecord
{
    public function setUp()
    {
        # Set up environment for this job
    }

    public function perform()
    {

        
        $ip = $this->args['ip'];
        $browser = $this->args['browser'];
        $url = $this->args['url'];
        $iduser = $this->args['iduser'];
        $session = $this->args['session'];
        
        
        $model = new Analytics();
        $model->url = $url;
        
        
        $model->ip = $ip;
        $model->iduser = ($iduser)?$iduser:'0';
        $model->session=$session;
        $model->browser=$browser;
        $model->cdate = DATE_RFC3339;
        if($model->save()){
            echo "Saved Successfully!";
        }
        else{
            print_r($model->getErrors());
        }
        //echo "<pre>";print_r($model->attributes);
        
        # Run task
    }

    public function tearDown()
    {
        # Remove environment for this job
    }
}