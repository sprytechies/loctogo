<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "todolist".
 *
 * @property integer $idtodolist
 * @property integer $idtodo
 * @property integer $iduser
 * @property string $name
 * @property string $reminder
 * @property string $cdate
 * @property string $mdate
 *
 * @property Todo $idtodo0
 * @property User $iduser0
 * @property TodolistFriends[] $todolistFriends
 */
class Todolist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todolist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodolist'], 'required'],
            [['idtodolist', 'idtodo', 'iduser'], 'integer'],
            [['reminder', 'cdate', 'mdate'], 'safe'],
            [['name'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtodolist' => Yii::t('app', 'Idtodolist'),
            'idtodo' => Yii::t('app', 'Idtodo'),
            'iduser' => Yii::t('app', 'Iduser'),
            'name' => Yii::t('app', 'Name'),
            'reminder' => Yii::t('app', 'Reminder'),
            'cdate' => Yii::t('app', 'Cdate'),
            'mdate' => Yii::t('app', 'Mdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtodo0()
    {
        return $this->hasOne(Todo::className(), ['idtodo' => 'idtodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodolistFriends()
    {
        return $this->hasMany(TodolistFriends::className(), ['idtodolist' => 'idtodolist']);
    }
}
