<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author sprytechies
 */
namespace frontend\components;
use Yii;


class Controller extends \yii\web\Controller{
    //put your code here
    
    /** successCallback for getting credentials of 
     * user by login and used in application by saving into
     * database.
     * @param type $client
     * @return type
     */
    public function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    public  function beforeAction($action) {
        parent::beforeAction($action);
        
        $url = Yii::$app->request->hostInfo.Yii::$app->request->url;
        $ip = $this->getIp();
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $iduser = Yii::$app->user->id;
        $session = serialize(Yii::$app->getSession());
        if(true){
            
            Yii::$app->resque->createJob('track', 'TrackRecord', $args = ['ip'=>$ip,
                'url'=>$url,
                'browser'=>$browser,
                'iduser'=>$iduser,  
                'session'=>$session,
                    ]);
            return true;
        }
        else
            return false;
        
    }
}
