<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property integer $email_id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $subject
 * @property string $content
 * @property string $attachment
 * @property integer $user_id
 * @property string $time
 * @property integer $branch_id
 * @property integer $company_id
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email', 'subject', 'content', 'user_id', 'time', 'branch_id', 'company_id'], 'required'],
            [['content'], 'string'],
            [['user_id', 'branch_id', 'company_id'], 'integer'],
            [['time'], 'safe'],
            [['receiver_name'], 'string', 'max' => 50],
            [['receiver_email'], 'string', 'max' => 200],
            [['subject', 'attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email_id' => 'Email ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'subject' => 'Subject',
            'content' => 'Content',
            'attachment' => 'Attachment',
            'user_id' => 'User ID',
            'time' => 'Time',
            'branch_id' => 'Branch ID',
            'company_id' => 'Company ID',
        ];
    }
}
