<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hashfiles".
 *
 * @property integer $hashfile_id
 * @property string $hashfile_oldhash
 * @property string $hashfile_newhash
 * @property integer $hashfile_project_id
 * @property string $hashfile_usestatus
 * @property string $hashfile_date
 */
class Hashfiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hashfiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hashfile_project_id'], 'integer'],
            [['hashfile_usestatus'], 'string'],
            [['hashfile_date'], 'safe'],
            [['hashfile_oldhash','hashfile_version', 'hashfile_newhash'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hashfile_id' => '编号 ID',
            'hashfile_oldhash' => '旧版本号',
            'hashfile_newhash' => '新版本号',
            'hashfile_project_id' => '项目端',
            'hashfile_version'=>'版本号',
            'hashfile_usestatus' => '使用状态',
            'hashfile_date' => '日期',
        ];
    }
    
    public function getProjectesName(){
        return $this->hasOne(Projectes::className(), ['project_id'=>'hashfile_project_id']);
    }
}
