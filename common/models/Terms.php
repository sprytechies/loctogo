<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "terms".
 *
 * @property integer $idterms
 * @property string $name
 * @property integer $parent
 * @property integer $type
 */
class Terms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent', 'type'], 'required'],
            [['parent', 'type'], 'integer'],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idterms' => Yii::t('app', 'Idterms'),
            'name' => Yii::t('app', 'Name'),
            'parent' => Yii::t('app', 'Parent'),
            'type' => Yii::t('app', 'Type'),
        ];
    }
}
