<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Demandes */

$this->title = 'Create Demandes';
$this->params['breadcrumbs'][] = ['label' => 'Demandes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demandes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsEmbranches' =>$modelsEmbranches,
    ]) ?>

</div>
