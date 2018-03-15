<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hashbodies */

$this->title = 'Create Hashbodies';
$this->params['breadcrumbs'][] = ['label' => 'Hashbodies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashbodies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
