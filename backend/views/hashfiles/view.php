<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hashfiles */

$this->title = $model->hashfile_id;
$this->params['breadcrumbs'][] = ['label' => 'Hashfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashfiles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hashfile_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hashfile_id], [
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
            'hashfile_id',
            'hashfile_oldhash',
            'hashfile_newhash',
            'hashfile_project_id',
            'hashfile_usestatus',
            'hashfile_date',
        ],
    ]) ?>

</div>
