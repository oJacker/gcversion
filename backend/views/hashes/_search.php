<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HashesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['findhash'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hash_begin') ?>

    <?= $form->field($model, 'hash_end') ?>

    <?= $form->field($model, 'hash_auther') ?>


    <?php // echo $form->field($model, 'has_committer_date') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
