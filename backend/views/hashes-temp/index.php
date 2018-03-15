<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HashesTempSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hashes Temps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashes-temp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hashes Temp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hash_id',
            'hash_source',
            'hash_source_branch',
            'hash_committer_name',
            'has_committer_email:email',
            // 'has_committer_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
