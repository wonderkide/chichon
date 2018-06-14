<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 're_password')->passwordInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'role')->dropDownList($dropdown); ?>

    <?php //echo $form->field($model, 'status')->textInput() ?>
    <?php //echo $form->field($model, 'status')->dropDownList(Yii::$app->params['statusMember']); ?>

    <?php //echo $form->field($model, 'created_at')->textInput() ?>

    <?php //echo $form->field($model, 'updated_at')->textInput() ?>
    <?php //echo $form->field($model, 'permission')->dropDownList(Yii::$app->params['permission']); ?>
    <?php //echo $form->field($model, 'id_rank')->dropDownList($rank); ?>
    <?php //echo $form->field($model, 'exp')->textInput(['maxlength' => true]); ?>
    <?php //echo $form->field($model, 'permission')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'createusr' : 'editusr', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>