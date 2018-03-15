<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Demandes */

$this->title = 'Update Demandes: ' . $model->demand_id;
$this->params['breadcrumbs'][] = ['label' => 'Demandes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->demand_id, 'url' => ['view', 'id' => $model->demand_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demandes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsEmbranches' => $modelsEmbranches,
    ]) ?>

</div>
