<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HashfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hashfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashfiles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建版本', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('生产脚本', ['scripts'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
      //      'hashfile_id',
            'projectesName.project_name',
            'hashfile_oldhash',
            'hashfile_newhash',
            'hashfile_version',
            //'hashfile_project_id',
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute' => 'hashfile_usestatus',
                'value'=>function($model){
                    if($model->hashfile_usestatus=='used'){
                        return "使用";
                    }elseif($model->hashfile_usestatus=='unused'){
                        return "未使用";
                    }else{
                         return "归档";
                    }
                }
            ],
           // 'hashfile_usestatus',
            // 'hashfile_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
