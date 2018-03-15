<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "projectes".
 *
 * @property integer $project_id
 * @property string $project_name
 * @property string $project_path
 * @property string $project_status
 * @property string $project_date
 */
class Projectes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projectes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_name', 'project_path', 'project_date'], 'required'],
            [['project_status'], 'string'],
            [['project_date'], 'safe'],
            [['project_name'], 'string', 'max' => 50],
            [['project_path'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => '项目ID',
            'project_name' => '项目名',
            'project_path' => '项目路径',
            'project_status' => '项目状态',
            'project_date' => '项目日期',
        ];
    }
}
