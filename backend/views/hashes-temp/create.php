<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HashesTemp */

$this->title = 'Create Hashes Temp';
$this->params['breadcrumbs'][] = ['label' => 'Hashes Temps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashes-temp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
