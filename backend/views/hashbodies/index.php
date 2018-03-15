<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HashbodiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hashbodies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashbodies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hashbodies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hashbody_id',
            'hashbody_text:ntext',
            'hashbody_project_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
