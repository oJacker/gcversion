<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Demandes;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Embranches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="embranches-form">

    <?php $form = ActiveForm::begin(); ?>

 
    <?= $form->field($model, 'demandes_demand_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Demandes::find()->all(),'demand_id','demand_name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select Company ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'enbranch_projectend')->dropDownList([ 'Wap' => 'Wap', 'Frontend' => 'Frontend', 'Admin' => 'Admin', 'Api' => 'Api', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model, 'embranch_version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'embranch_developer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'embranch_status')->dropDownList([ 'inactive' => 'Inactive', 'active' => 'Active', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model, 'embranch_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
