<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'company_email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'company_address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <?= $form->field($model, 'company_status')->dropDownList([ 'inactive' => 'Inactive', 'active' => 'Active', ], ['prompt' => 'status']) ?>

    <!--Create Branch For this Company-->
    <?= $form->field($branch, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($branch, 'branch_address')->textInput(['maxlength' => true]) ?>


    <?= $form->field($branch, 'branch_status')->dropDownList([ 'inactive' => 'Inactive', 'active' => 'Active', ], ['prompt' => 'status']) ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
