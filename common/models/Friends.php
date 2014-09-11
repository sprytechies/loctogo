<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "friends".
 *
 * @property integer $idfriends
 * @property integer $iduser
 * @property integer $idfriend
 * @property string $cdate
 * @property string $mdate
 */
class Friends extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'friends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfriends'], 'required'],
            [['idfriends', 'iduser', 'idfriend'], 'integer'],
            [['cdate', 'mdate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfriends' => Yii::t('app', 'Idfriends'),
            'iduser' => Yii::t('app', 'Iduser'),
            'idfriend' => Yii::t('app', 'Idfriend'),
            'cdate' => Yii::t('app', 'Cdate'),
            'mdate' => Yii::t('app', 'Mdate'),
        ];
    }
}
