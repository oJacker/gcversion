<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "embranches".
 *
 * @property integer $embranch_id
 * @property integer $demandes_demand_id
 * @property string $enbranch_projectend
 * @property string $embranch_version
 * @property string $embranch_developer
 * @property string $embranch_created_date
 * @property string $embranch_status
 * @property string $embranch_description
 */
class Embranches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'embranches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enbranch_projectend', 'embranch_version', 'embranch_developer'], 'required','message'=>'Please enter a value for {attribute}'],
            [['demandes_demand_id'], 'integer'],
            [['enbranch_projectend', 'embranch_status'], 'string'],
            [['embranch_created_date'], 'safe'],
            [['embranch_version', 'embranch_developer'], 'string', 'max' => 32],
            [['embranch_description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'embranch_id' => '编号',
            'demandes_demand_id' => '需求内容',
            'enbranch_projectend' => '项目端',
            'embranch_version' => '版本号',
            'embranch_developer' => '开发人员',
            'embranch_created_date' => '创建日期',
            'embranch_status' => '状态',
            'embranch_description' => '描述',
        ];
    }
    
    public function getDemandesName(){
        return $this->hasOne(Demandes::className(), ['demand_id'=>'demandes_demand_id']);
    }
}
