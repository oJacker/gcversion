<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Hashbodies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashbodies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hashbody_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hashbody_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hashbody_project_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
