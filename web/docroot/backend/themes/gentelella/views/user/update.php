<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = 'Update user';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['/user']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => 'Admin',
            'url' => Yii::$app->getHomeUrl()],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="user-model-update">
            

            <!--<h1>แก้ไขข้อมูล user</h1>-->

            <?= $this->render('_edit', [
                'model' => $model,
                'dropdown' => $dropdown,
            ]) ?>

        </div>
    </div>
    
</div>