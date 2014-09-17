<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "analytics".
 *
 * @property integer $idanalytics
 * @property string $url
 * @property string $ip
 * @property integer $iduser
 * @property string $session
 * @property string $browser
 * @property string $cdate
 * @property string $mdate
 */
class Analytics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analytics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'ip', 'iduser', 'session', 'browser', 'cdate'], 'required'],
            [['iduser'], 'integer'],
            [['session', 'browser'], 'string'],
            [['cdate', 'mdate'], 'safe'],
            [['url'], 'string', 'max' => 128],
            [['ip'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idanalytics' => Yii::t('app', 'Idanalytics'),
            'url' => Yii::t('app', 'Url'),
            'ip' => Yii::t('app', 'Ip'),
            'iduser' => Yii::t('app', 'Iduser'),
            'session' => Yii::t('app', 'Session'),
            'browser' => Yii::t('app', 'Browser'),
            'cdate' => Yii::t('app', 'Cdate'),
            'mdate' => Yii::t('app', 'Mdate'),
        ];
    }
}
