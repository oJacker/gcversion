<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property integer $id
 * @property string $tag
 * @property string $hash
 * @property string $commit
 * @property string $starttime
 * @property string $merge
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['hash'], 'string', 'max' => 100],
            [['tag'], 'string'],
            [['commit'], 'string'],
            [['starttime'], 'string'],
            [['merge'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag',
            'hash' => 'Hash',
            'commit' => 'Commit',
            'starttime' => 'Starttime',
            'merge' => 'Merge',
        ];
    }
}
