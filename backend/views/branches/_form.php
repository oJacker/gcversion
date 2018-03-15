<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Companies;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin([
            'id'=>$model->formName(),
            'enableAjaxValidation' =>true,
            'validationUrl' => Url::toRoute('branches/validation')

            ]); ?>

<!--    <? = $form->field($model, 'companies_company_id')->textInput() ?>-->
<!--    <? = $form->field($model, 'companies_company_id')->dropDownList(
            ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
            ['prompt'=>'Select Company']
            
    ) ?>-->
    <?= $form->field($model, 'companies_company_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select Company ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
<!--   <? = $form->field($model, 'branch_name',[
         'template' =>'<div class="input-group"><span class="input-group-btn">'
         . '<button class="btn btn-default">Go!</button></span>{input}</div>'
     ]) ?>-->
    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'branch_status')->dropDownList([ 'inactive' => 'Inactive', 'active' => 'Active', ], ['prompt' => 'status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php $script =<<< JS
   $('form#{$model->formName()}').on('beforeSubmit', function(e){
       var \$form = $(this);
       $.post(
          \$form.attr("action"),
          \$form.serialize()
        ).done(function(result){
            if(result == 'success'){
                $(\$form).trigger("reset");
                $.pjax.reload({container: "#branchGrid"});
            }else{
                $("#message").html(result);
            }
        }).fail(function(){
           console.log("server error"); 
        });
       return false;
   });           
JS;
$this->registerJs($script)
?>
