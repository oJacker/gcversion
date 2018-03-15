<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hashfiles */

$this->title = 'Update Hashfiles: ' . $model->hashfile_id;
$this->params['breadcrumbs'][] = ['label' => 'Hashfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hashfile_id, 'url' => ['view', 'id' => $model->hashfile_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hashfiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
