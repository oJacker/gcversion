<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Hashes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashes-form">

    <?php $form = ActiveForm::begin(); ?>

      <tr data-key="69dd6a6ef907a0182bc5af81dd3c724649d47f2f"><td>1</td>
         <td>69dd6a6ef907a0182bc5af81dd3c724649d47f2f</td>
         <td>c8919ed 59607c2</td><td>Merge-branch-myDev-into-Dev</td>
         <td>xinting.zhang</td>
         <td><a href="mailto:xinting.zhang@5262.com">xinting.zhang@5262.com</a></td>
     </tr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
