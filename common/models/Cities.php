<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $idcities
 * @property integer $idstates
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 * @property string $wikilink
 *
 * @property States $idstates0
 * @property Todo[] $todos
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcities'], 'required'],
            [['idcities', 'idstates'], 'integer'],
            [['name', 'wikilink'], 'string', 'max' => 128],
            [['longitude', 'latitude'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcities' => Yii::t('app', 'Idcities'),
            'idstates' => Yii::t('app', 'Idstates'),
            'name' => Yii::t('app', 'Name'),
            'longitude' => Yii::t('app', 'Longitude'),
            'latitude' => Yii::t('app', 'Latitude'),
            'wikilink' => Yii::t('app', 'Wikilink'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdstates0()
    {
        return $this->hasOne(States::className(), ['idstates' => 'idstates']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodos()
    {
        return $this->hasMany(Todo::className(), ['idcities' => 'idcities']);
    }
}
