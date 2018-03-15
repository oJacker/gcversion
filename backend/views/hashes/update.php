<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hashes */

$this->title = 'Update Hashes: ' . $model->hash_id;
$this->params['breadcrumbs'][] = ['label' => 'Hashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hash_id, 'url' => ['view', 'id' => $model->hash_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hashes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
