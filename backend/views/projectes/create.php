<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Projectes */

$this->title = 'Create Projectes';
$this->params['breadcrumbs'][] = ['label' => 'Projectes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
