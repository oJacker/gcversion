<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hashbodies".
 *
 * @property string $hashbody_id
 * @property string $hashbody_text
 * @property integer $hashbody_project_id
 */
class Hashbodies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hashbodies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hashbody_id'], 'required'],
            [['hashbody_text'], 'string'],
            [['hashbody_project_id'], 'integer'],
            [['hashbody_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hashbody_id' => 'Hashbody ID',
            'hashbody_text' => 'Hashbody Text',
            'hashbody_project_id' => 'Hashbody Project ID',
        ];
    }
}
