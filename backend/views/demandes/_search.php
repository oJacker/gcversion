<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DemandesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demandes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'demand_id') ?>

    <?= $form->field($model, 'demand_name') ?>

    <?= $form->field($model, 'demand_status') ?>

    <?= $form->field($model, 'demand_leading') ?>

    <?= $form->field($model, 'demand_created_date') ?>

    <?php // echo $form->field($model, 'demand_update_date') ?>

    <?php // echo $form->field($model, 'demand_begin_date') ?>

    <?php // echo $form->field($model, 'demand_end_date') ?>

    <?php // echo $form->field($model, 'demand_remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
