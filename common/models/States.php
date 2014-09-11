<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "states".
 *
 * @property integer $idstates
 * @property integer $idcountry
 * @property string $name
 *
 * @property Cities[] $cities
 * @property Countries $idcountry0
 */
class States extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idstates'], 'required'],
            [['idstates', 'idcountry'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idstates' => Yii::t('app', 'Idstates'),
            'idcountry' => Yii::t('app', 'Idcountry'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(Cities::className(), ['idstates' => 'idstates']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcountry0()
    {
        return $this->hasOne(Countries::className(), ['idcountries' => 'idcountry']);
    }
}
