<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property integer $idscore
 * @property integer $type
 * @property integer $iduser
 * @property integer $value
 * @property integer $idtodo
 * @property integer $idcomment
 * @property string $cdate
 * @property string $mdate
 *
 * @property User $iduser0
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idscore'], 'required'],
            [['idscore', 'type', 'iduser', 'value', 'idtodo', 'idcomment'], 'integer'],
            [['cdate', 'mdate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idscore' => Yii::t('app', 'Idscore'),
            'type' => Yii::t('app', 'Type'),
            'iduser' => Yii::t('app', 'Iduser'),
            'value' => Yii::t('app', 'Value'),
            'idtodo' => Yii::t('app', 'Idtodo'),
            'idcomment' => Yii::t('app', 'Idcomment'),
            'cdate' => Yii::t('app', 'Cdate'),
            'mdate' => Yii::t('app', 'Mdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }
}
