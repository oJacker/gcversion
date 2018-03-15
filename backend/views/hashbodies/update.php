<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hashbodies */

$this->title = 'Update Hashbodies: ' . $model->hashbody_id;
$this->params['breadcrumbs'][] = ['label' => 'Hashbodies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hashbody_id, 'url' => ['view', 'id' => $model->hashbody_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hashbodies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
