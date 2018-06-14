<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = 'Create User';
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
        <div class="user-model-create">
            <!--<h3>Add User</h3>-->

            <?= $this->render('_add', [
                'model' => $model,
                'dropdown' => $dropdown,
            ]) ?>

        </div>
    </div>
    
</div>