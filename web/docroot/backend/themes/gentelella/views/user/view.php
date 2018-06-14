<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\helpFunction;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\MatchModel */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['/user']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-model-view">
    <?= Breadcrumbs::widget([
        'homeLink' => ['label' => 'Admin',
        'url' => Yii::$app->getHomeUrl()],
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Update', ['editusr', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            //'id_rank',
            'username',
            //'email',
            //'nickname',
            //'status',
            [
                'format'=>'text',
                //'label' => 'color',
                'attribute' => 'created_at',
                'value' => helpFunction::dateTimeMinute(date("Y-m-d h:i:s",$model->created_at))
            ],
            [
                'format'=>'text',
                //'label' => 'color',
                'attribute' => 'updated_at',
                'value' => helpFunction::dateTimeMinute(date("Y-m-d h:i:s",$model->updated_at))
            ],
            //'post_point',
            //'permission',
            //'zeny',
            //'ip',
        ],
    ]) ?>

</div>