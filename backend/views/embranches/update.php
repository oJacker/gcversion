<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Embranches */

$this->title = 'Update Embranches: ' . $model->embranch_id;
$this->params['breadcrumbs'][] = ['label' => 'Embranches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->embranch_id, 'url' => ['view', 'id' => $model->embranch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="embranches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
