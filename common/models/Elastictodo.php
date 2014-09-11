<?php

namespace common\models;

use Yii;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Elastictodo extends \yii\elasticsearch\ActiveRecord
{
    /**
     * @return array the list of attributes for this record
     */
    public function attributes()
    {
        // path mapping for '_id' is setup to field 'id'
        return ['idtodo', 'city', 'state', 'country', 'iduser', 'description', 'image', 'active', 'username', 'firstname', 'lastname', 'email', 'status', 'tags', 'cdate', 'mdate'];
    }
    

    /**
     * Defines a scope that modifies the `$query` to return only active(status = 1) 
     */
    public static function active($query)
    {
        $query->andWhere(['active' => 1]);
    }
}