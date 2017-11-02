<?php 

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->registerJsFile('/js/auth.js', ['depends'=>'app\assets\AppAsset']);
$this->registerJs("$('#auth').authchoice();");
?>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-12">
            <h1 class="page-header">
                Sign In :
            </h1>
            <div id='auth'>
                <?= Html::a(Yii::t('user', 'Sign in / Register with Facebook'), '/user/security/auth?authclient=facebook', ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>
            </div>
            <p class="text-center"></p>
            <p class="text-center">Or</p>
            <?php
            $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'action' => Url::to(['/user/login'])
                ]) ?>

                <?= $form->field($model, 'login', ['inputOptions' => ['placeholder'=>'Username / Email', 'class' => 'form-control', 'tabindex' => '1']])->label('') ?>

                <?= $form->field($model, 'password', ['inputOptions' => ['placeholder'=>'Password', 'class' => 'form-control']])->passwordInput()->label('') ?>
            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>
                </div>
                <div class="col-xs-6 text-right">
                    <p><?= Html::a(Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) ?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-success', 'tabindex' => '3']) ?>
                </div>
                <div class="col-xs-6 text-right">
                    <a class="btn green" href="/user/register">Sign Up</a>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>