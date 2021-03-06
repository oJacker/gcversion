<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hashes_temp".
 *
 * @property string $hash_id
 * @property string $hash_source
 * @property string $hash_source_branch
 * @property string $hash_committer_name
 * @property string $has_committer_email
 * @property string $has_committer_date
 */
class HashesTemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hashes_temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash_id'], 'required'],
            [['has_committer_date'], 'safe'],
            [['hash_id'], 'string', 'max' => 50],
            [['hash_source'], 'string', 'max' => 64],
            [['hash_source_branch'], 'string', 'max' => 100],
            [['hash_committer_name', 'has_committer_email'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hash_id' => 'Hash ID',
            'hash_source' => 'Hash Source',
            'hash_source_branch' => 'Hash Source Branch',
            'hash_committer_name' => 'Hash Committer Name',
            'has_committer_email' => 'Has Committer Email',
            'has_committer_date' => 'Has Committer Date',
        ];
    }
}
