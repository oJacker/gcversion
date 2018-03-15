<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmbranchesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="embranches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'embranch_id') ?>

    <?= $form->field($model, 'demandes_demand_id') ?>

    <?= $form->field($model, 'enbranch_projectend') ?>

    <?= $form->field($model, 'embranch_version') ?>

    <?= $form->field($model, 'embranch_developer') ?>

    <?php // echo $form->field($model, 'embranch_created_date') ?>

    <?php // echo $form->field($model, 'embranch_status') ?>

    <?php // echo $form->field($model, 'embranch_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
