<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HashfilesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashfiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hashfile_id') ?>

    <?= $form->field($model, 'hashfile_oldhash') ?>

    <?= $form->field($model, 'hahsfile_newhash') ?>

    <?= $form->field($model, 'hashfile_project_id') ?>

    <?= $form->field($model, 'hashfile_usestatus') ?>

    <?php // echo $form->field($model, 'hashfile_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
