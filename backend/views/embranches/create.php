<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Embranches */

$this->title = 'Create Embranches';
$this->params['breadcrumbs'][] = ['label' => 'Embranches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="embranches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
