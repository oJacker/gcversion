<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Demandes */

$this->title = $model->demand_id;
$this->params['breadcrumbs'][] = ['label' => 'Demandes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demandes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->demand_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->demand_id], [
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
            'demand_id',
            'demand_name:ntext',
            [
                 'attribute'=>'demand_status',
                 'value' =>function($model){
                    if($model->demand_status == 'QuasiProduction'){
                        return '准生产';
                    }elseif($model->demand_status == 'Production'){
                        return '生产';
                    }elseif($model->demand_status == 'Testing'){
                        return '测试';
                    }elseif($model->demand_status == 'Develop'){
                        return '开发';
                    }else{
                        return '暂存';
                    }
                 }
            ],
            'demand_leading',
            'demand_created_date',
            'demand_update_date',
            'demand_begin_date',
            'demand_end_date',
            'demand_remarks:ntext',
        ],
    ]) ?>

</div>
