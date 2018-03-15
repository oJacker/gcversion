<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hashes */

$this->title = 'Create Hashes';
$this->params['breadcrumbs'][] = ['label' => 'Hashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
