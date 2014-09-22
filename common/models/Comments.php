<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $idcomments
 * @property integer $idtodo
 * @property string $description
 * @property integer $iduser
 * @property integer $parent
 * @property string $cdate
 * @property string $mdate
 *
 * @property Todo $idtodo0
 * @property User $iduser0
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodo', 'iduser', 'parent'], 'integer'],
            [['description'], 'string'],
            [['cdate', 'mdate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcomments' => 'Idcomments',
            'idtodo' => 'Idtodo',
            'description' => 'Description',
            'iduser' => 'Iduser',
            'parent' => 'Parent',
            'cdate' => 'Cdate',
            'mdate' => 'Mdate',
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
}