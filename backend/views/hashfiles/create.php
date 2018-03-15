<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hashfiles */

$this->title = '创建版本';
$this->params['breadcrumbs'][] = ['label' => 'Hashfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashfiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
