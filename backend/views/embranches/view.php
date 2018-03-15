<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Embranches */

$this->title = $model->embranch_id;
$this->params['breadcrumbs'][] = ['label' => 'Embranches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="embranches-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->embranch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->embranch_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'embranch_id',
            'demandes_demand_id',
            'enbranch_projectend',
            'embranch_version',
            'embranch_developer',
            'embranch_created_date',
            'embranch_status',
            'embranch_description',
        ],
    ]) ?>

</div>
