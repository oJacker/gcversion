<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HashesTemp */

$this->title = $model->hash_id;
$this->params['breadcrumbs'][] = ['label' => 'Hashes Temps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashes-temp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hash_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hash_id], [
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
            'hash_id',
            'hash_source',
            'hash_source_branch',
            'hash_committer_name',
            'has_committer_email:email',
            'has_committer_date',
        ],
    ]) ?>

</div>
