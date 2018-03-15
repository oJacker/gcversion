<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Projectes */

$this->title = 'Update Projectes: ' . $model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Projectes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="projectes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
