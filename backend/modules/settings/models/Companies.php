<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $company_start_date
 * @property string $company_created_date
 * @property string $company_status
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'company_address'], 'required'],
            [['company_start_date', 'company_created_date'], 'safe'],
            ['company_start_date','checkDate'],
            [['company_status'], 'string'],
            [['company_name', 'company_email'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 255],
        ];
    }
    
    public function checkDate($attribute,$params){
        $today = strtotime(date('Y-m-d'));
        $selectdDate =strtotime($this->company_start_date) ;
        if($selectdDate > $today ){
            $this->addError($attribute,'Company Start Date Must be Smaller');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_start_date' => 'Company Start Date',
            'company_created_date' => 'Company Created Date',
            'company_status' => 'Company Status',
        ];
    }
}
