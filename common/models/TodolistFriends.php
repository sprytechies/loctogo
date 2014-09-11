<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "todolist_friends".
 *
 * @property integer $idtodolist_friends
 * @property integer $idtodolist
 * @property integer $iduser
 * @property integer $idfriends
 * @property string $cdate
 * @property string $mdate
 *
 * @property Todolist $idtodolist0
 */
class TodolistFriends extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todolist_friends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodolist_friends'], 'required'],
            [['idtodolist_friends', 'idtodolist', 'iduser', 'idfriends'], 'integer'],
            [['cdate', 'mdate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtodolist_friends' => Yii::t('app', 'Idtodolist Friends'),
            'idtodolist' => Yii::t('app', 'Idtodolist'),
            'iduser' => Yii::t('app', 'Iduser'),
            'idfriends' => Yii::t('app', 'Idfriends'),
            'cdate' => Yii::t('app', 'Cdate'),
            'mdate' => Yii::t('app', 'Mdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtodolist0()
    {
        return $this->hasOne(Todolist::className(), ['idtodolist' => 'idtodolist']);
    }
}
