<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HashesTemp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashes-temp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hash_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hash_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hash_source_branch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hash_committer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_committer_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_committer_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
