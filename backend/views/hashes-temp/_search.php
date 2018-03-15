<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HashesTempSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashes-temp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hash_id') ?>

    <?= $form->field($model, 'hash_source') ?>

    <?= $form->field($model, 'hash_source_branch') ?>

    <?= $form->field($model, 'hash_committer_name') ?>

    <?= $form->field($model, 'has_committer_email') ?>

    <?php // echo $form->field($model, 'has_committer_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
