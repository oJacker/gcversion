<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmbranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Embranches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="embranches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Embranches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
        <?php
    $gridColumns=[
        [
            'class' => 'yii\grid\SerialColumn',
        ],
         'embranch_id',
        //'demandes_demand_id',
        [
            'attribute'=>'demandesName.demand_name',
            
            'width'=>'500px',
            'hAlign' => 'middle',
            'format'=>'raw',
            
        ],
        'enbranch_projectend',
        'embranch_version',
        [
            'attribute'=> 'embranch_developer',
            'width'=>'200px',
            'hAlign' => 'right',
            
        ],
        'demandesName.demand_leading',
        'demandesName.demand_created_date', 
        'demandesName.demand_begin_date',
        'demandesName.demand_end_date',
        'demandesName.demand_remarks',
        // 'embranch_created_date',
        // 'embranch_status',
        // 'embranch_description',
        ['class' => 'yii\grid\ActionColumn'],
         
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'dropdownOptions' => ['icon' => '<i class="glyphicon glyphicon-export"></i>', 'label' => '导出', 'class' => 'btn btn-sm btn-primary'],
       // 'fontAwesome' => true,
        'stream' => true,
        'filename'=> '版本管理'.date('Y-m-d'),
        'autoWidth'=>true,
        'messages'=>[
            'allowPopups' =>'',
            'confirmDownload'=>'',
        ],
        'groupedRowStyle'=>[
            'font' => [
            'bold' => false,
            'color' => [
                'argb' => '000000',
                ],
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'C9C9C9',
                ],
            ],
            
            
        ],
        'exportConfig' => [
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_PDF => false,
            ExportMenu::FORMAT_HTML=>false,
            ExportMenu::FORMAT_CSV=>false,
            'Excel2007' => false,
            'Excel5' => false,
             ExportMenu::FORMAT_EXCEL_X => [
                 'linkOptions' => [
                    // 'class' => 'btn btn-default',    
                ],
                'alertMsg' =>'确定要导出数据',
            ],
        
        ]
        
    ]);     
 
    ?>
    
    
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

             'embranch_id',
            //'demandes_demand_id',
//             [
//                'attribute' =>'demandes_demand_id',
//                'value' => 'demandesName.demand_name',
//            ],
             'enbranch_projectend',
             'embranch_version',
             'embranch_developer',
             'embranch_created_date',
            // 'embranch_status',
             'embranch_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
