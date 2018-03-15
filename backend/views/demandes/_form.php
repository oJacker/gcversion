<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Demandes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demandes-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>

    <?= $form->field($model, 'demand_name')->textarea(['rows' => 6]) ?>

    

    <?= $form->field($model, 'demand_leading')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'demand_begin_date')->widget(DatePicker::className(),[
         // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
           // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
    ]); ?>
    <!--<? = $form->field($model, 'demand_begin_date')->textInput() ?>-->
    
    <?= $form->field($model, 'demand_status')->dropDownList([ 'Inactive' => 'Inactive', 'Production' => 'Production', 
                    'QuasiProduction' => 'QuasiProduction', 'Testing' => 'Testing', 'Develop' => 'Develop', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model, 'demand_remarks')->textarea(['rows' => 6]) ?>
    
    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Embarches</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsEmbranches[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'enbranch_projectend',
                    'embranch_version',
                    'embranch_developer',
                    'embranch_status',
                    'embranch_description',
                   // 'po_id',
                    
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsEmbranches as $i => $modelEmbranches): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Embarches</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelEmbranches->isNewRecord) {
                                echo Html::activeHiddenInput($modelEmbranches, "[{$i}]embranch_id");
                            }
                        ?>
                        <!--<? = $form->field($modelPoItem, "[{$i}]po_item_no")->textInput(['maxlength' => true]) ?>-->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelEmbranches, "[{$i}]enbranch_projectend")->dropDownList([ 'Wap' => 'Wap', 'Frontend' => 'Frontend', 'Admin' => 'Admin', 'Api' => 'Api', ], ['prompt' => 'Status']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEmbranches, "[{$i}]embranch_version")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
              
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelEmbranches, "[{$i}]embranch_developer")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEmbranches, "[{$i}]embranch_status")->dropDownList([ 'inactive' => 'Inactive', 'active' => 'Active', ], ['prompt' => 'Status']) ?>
                            </div>
                        </div><!-- .row -->
                        
 
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($modelEmbranches, "[{$i}]embranch_description")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                      
                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        </div>
    </div>
    
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
