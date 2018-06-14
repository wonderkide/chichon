<?php
use yii\helpers\Html;
use yii\grid\GridView;
//Yii::$app->controller->renderPartial('_menu');
//$this->title = 3;
//$this->params['breadcrumbs'][] = ['label' => 'Note Models', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="user-model-index">
            <h1>จัดการข้อมูล User</h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create User', ['createusr'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'username',
                    //'auth_key',
                    //'password_hash',
                    //'password_reset_token',
                    'email:email',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',
                    // 'permission',
                    /*[
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'permission',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['permission'][$data->permission];
                        },
                    ],*/
                    //'id_rank',
                    //'exp',
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {re_pass} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/user/editusr/' . $model->id);
                            },
                            're_pass' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-certificate"></span>', '/user/resetpassword/' . $model->id);
                            },
                            /*'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/wonderkide/users/deleteusr/' . $model->id);
                            },*/
                        ]
                    ],
                ],
            ]); ?>

        </div>
    </div>
    
</div>