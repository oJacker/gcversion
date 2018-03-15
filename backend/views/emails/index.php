<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'email_id:email',
            'receiver_name',
            'receiver_email:email',
            'subject',
            'content:ntext',
            // 'attachment',
            // 'user_id',
            // 'time',
            // 'branch_id',
            // 'company_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
