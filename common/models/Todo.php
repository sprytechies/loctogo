<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property integer $idtodo
 * @property integer $idcities
 * @property integer $iduser
 * @property string $description
 * @property string $image
 * @property string $active
 * @property string $cdate
 * @property string $mdate
 *
 * @property Comments[] $comments
 * @property Cities $idcities0
 * @property User $iduser0
 * @property Todolist[] $todolists
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodo'], 'required'],
            [['idtodo', 'idcities', 'iduser', 'active'], 'integer'],
            [['cdate', 'mdate'], 'safe'],
            [['description'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtodo' => Yii::t('app', 'Idtodo'),
            'idcities' => Yii::t('app', 'Idcities'),
            'iduser' => Yii::t('app', 'Iduser'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'active' => Yii::t('app', 'Active'),
            'cdate' => Yii::t('app', 'Cdate'),
            'mdate' => Yii::t('app', 'Mdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['idtodo' => 'idtodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcities0()
    {
        return $this->hasOne(Cities::className(), ['idcities' => 'idcities']);
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
    public function getTodolists()
    {
        return $this->hasMany(Todolist::className(), ['idtodo' => 'idtodo']);
    }
}
