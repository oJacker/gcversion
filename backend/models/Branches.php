<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property integer $branch_id
 * @property integer $companies_company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_created_date
 * @property string $branch_status
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['companies_company_id','branch_name','branch_address','branch_status'], 'required'],
            [['branch_id', 'companies_company_id'], 'integer'],
            [['branch_created_date'], 'safe'],
            [['branch_status'], 'string'],
            [['branch_name'],'unique'],
            ['branch_status',  'required' ,'when'=>function($model){
                return (!empty($model->branch_address)) ? true:false;
            },'whenClient' => "function(){
                    if($('#branch_address').val() === undefined ){
                        false;
                    }else{
                        ture;
                    }
                }"
            ],
            [['branch_name'], 'string', 'max' => 100],
            [['branch_address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'companies_company_id' => 'Company Name',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_created_date' => 'Branch Created Date',
            'branch_status' => 'Branch Status',
        ];
    }
	
	public function getCompaniesCompany(){
		
		return $this->hasOne(Companies::className(),['company_id' => 'companies_company_id']);
	}
	public function getDepartments(){
		
		return $this->hasMany(Departments::className(), ['branches_branch_id' => 'branch_id']);
	}
}
