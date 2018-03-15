<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Hashfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashfiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hashfile_oldhash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hashfile_newhash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hashfile_project_id')->textInput() ?>
    
    <?= $form->field($model, 'hashfile_version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hashfile_usestatus')->dropDownList([ 'history' => 'History', 'unused' => 'Unused', 'used' => 'Used', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model, 'hashfile_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
