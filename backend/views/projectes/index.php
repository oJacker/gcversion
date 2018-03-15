<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projectes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Projectes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_id',
            'project_name',
            'project_path',
            'project_status',
            'project_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
