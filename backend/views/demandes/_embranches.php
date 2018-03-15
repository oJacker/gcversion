<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmbranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="embranches-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' =>function($model){
                if($model->embranch_status == 'inactive'){
                    return['class' =>'danger'];
                }else if($model->embranch_status == 'active'){
                    return['class' =>'success'];
                }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'embranch_id',
            //'demandes_demand_id',
            'enbranch_projectend',
            'embranch_version',
            'embranch_developer',
            // 'embranch_created_date',
            // 'embranch_status',
             'embranch_description',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
