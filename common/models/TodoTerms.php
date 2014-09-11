<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "todo_terms".
 *
 * @property integer $idtodo_terms
 * @property integer $idtodo
 * @property integer $idterms
 */
class TodoTerms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo_terms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodo', 'idterms'], 'required'],
            [['idtodo', 'idterms'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtodo_terms' => Yii::t('app', 'Idtodo Terms'),
            'idtodo' => Yii::t('app', 'Idtodo'),
            'idterms' => Yii::t('app', 'Idterms'),
        ];
    }
}
