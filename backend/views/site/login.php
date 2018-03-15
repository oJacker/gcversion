<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
<!--    <h1><? = Html::encode($this->title) ?></h1>-->
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <div  class="login-box-body">
             <p class="login-box-msg">Sign in to start your session</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username',['options'=>[
                            'tag'=>'div',
                            'class'=>'form-group has-feedback required'
                        ] ,
                        'template' => '{input}<span class ="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'
                    ])->textInput(['placeholder' => 'username']) ?>

                <?= $form->field($model, 'password',['options'=>[
                            'tag' =>'div',
                            'class'=>'form-group has-feedback required'
                        ],
                        'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                    
                ])->passwordInput() ?>

                <?= $form->field($model, 'rememberMe',['options'=>[
                        'tag' =>'div',
                        'class' =>'col-xs-8',
                    ],
                    'template'=>'{input}<div class="checkbox icheck"></div>'
                ])->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
