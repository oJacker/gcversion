<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\EmbranchesSearch;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DemandesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Demandes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demandes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Demandes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php
    $gridColumns=[
        'demand_id',
        'demand_name',
        'demand_leading',
        [
            
             'value'=>'embranchesBranch.embranch_version',
        ],
       
        'demand_created_date',
        'demand_update_date',
        'demand_begin_date',
        'demand_end_date',
        'demand_remarks',
  
         
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'dropdownOptions' => ['icon' => '<i class="glyphicon glyphicon-export"></i>', 'label' => '导出', 'class' => 'btn btn-sm btn-primary'],
        'fontAwesome' => true,
        'afterSaveView' => 'asdfasdsd',
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'value'=>function($model,$key,$index,$column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=> function($model,$key,$index,$column){
                    $embranchesModel = new EmbranchesSearch();
                    $embranchesModel->demandes_demand_id =$model->demand_id;
                    $dataProvider= $embranchesModel ->search(Yii::$app->request->queryParams);
                    
                    return Yii::$app->controller->renderPartial('_embranches',[
                        'searchModel' => $embranchesModel,
                        'dataProvider' =>$dataProvider,
                    ]);
                }
            ],

           // 'demand_id',
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
            //'demand_created_date',
            // 'demand_update_date',
            'demand_begin_date',
            'demand_end_date',
            // 'demand_remarks:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
