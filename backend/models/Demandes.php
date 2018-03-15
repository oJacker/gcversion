<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "demandes".
 *
 * @property integer $demand_id
 * @property string $demand_name
 * @property string $demand_status
 * @property string $demand_leading
 * @property string $demand_created_date
 * @property string $demand_update_date
 * @property string $demand_begin_date
 * @property string $demand_end_date
 * @property string $demand_remarks
 */
class Demandes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demandes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['demand_name', 'demand_leading', 'demand_created_date', 'demand_update_date', 'demand_begin_date'], 'required','message'=>'Please enter a value for {attribute}'],
            [['demand_name', 'demand_status', 'demand_remarks'], 'string'],
            [['demand_created_date', 'demand_update_date', 'demand_begin_date', 'demand_end_date'], 'safe'],
            [['demand_leading'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'demand_id' => '编号',
            'demand_name' => '需求功能',
            'demand_status' => '项目状态',
            'demand_leading' => '负责人',
            'demand_created_date' => '创建日期',
            'demand_update_date' => '更新日期',
            'demand_begin_date' => '规划日期',
            'demand_end_date' => '上线日期',
            'demand_remarks' => '描述',
        ];
    }
    
    public function geteEmbranchesBranch(){
		
        return $this->hasOne(Embranches::className(),['demandes_demand_id' => 'demand_id']);
    }
}
