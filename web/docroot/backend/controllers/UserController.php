<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use backend\models\UserSearch;
use common\models\UserModel;
use backend\models\SignupAdminForm;
use common\models\RePassword;
use yii\filters\AccessControl;
use backend\components\AdminController;

class UserController extends AdminController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                [
                    'actions'=>['index','createusr','view','editusr','resetpassword'],
                    'roles'=>['ManageUser'],
                    'allow'=>true
                ],
                [
                    'allow'=>true,
                    'actions'=>['delete'],
                    'roles'=>['Admin']
                ]
              ]
            ],
        ];
    }
    
    public function actionIndex(){
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreateusr()
    {   
        $model = new SignupAdminForm();
        $dropdown = $this->getAuthDropdown();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return $this->redirect('/user');
            }
        }
        return $this->render('create', [
            'model' => $model,
            'dropdown' => $dropdown,
        ]);
    }
    public function actionEditusr($id)
    {
        $assign = $this->findAssignment(Yii::$app->user->id, 'Admin');
        $is_admin = $this->findAssignment($id, 'Admin');
        if(!$assign && $is_admin){
            $this->notAllowed();
        }
        $model = $this->findModel($id);
        $dropdown = $this->getAuthDropdown();
        $auth = Yii::$app->authManager;
        $is_assignment = $auth->getAssignments($id);
        $rolename = null;
        if($is_assignment){
            foreach ($is_assignment as $row) {
                $rolename = $row->roleName;
                $model->role = $row->roleName;
            }
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->role == 'User' && $is_assignment){
                $this->removePermission($model->id);
            }
            else if(!$is_assignment){
                $auth->assign($auth->getRole($model->role), $model->id);
            }
            else if($model->role != $rolename){
                $this->removePermission($model->id);
                $auth->assign($auth->getRole($model->role), $model->id);
            }
            return $this->redirect('/user');
        } else {
            
            return $this->render('update', [
                'model' => $model,
                'dropdown' => $dropdown,
            ]);
        }
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $this->removePermission($id);
        return $this->redirect('/user');
    }
    
    public function actionResetpassword($id) {
        $assign = $this->findAssignment(Yii::$app->user->id, 'Admin');
        if(!$assign && Yii::$app->user->id != $id){
            $this->notAllowed();
        }
        
        $model = new RePassword();
        $model->id = $id;
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->reset()) {
                return $this->redirect('/user');
            }
        }
        return $this->render('resetpassword', [
                'model' => $model,
            ]);
    }
    /**
     * Finds the UserModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function getAuthDropdown() {
        $auth = Yii::$app->authManager;
        $dd = [];
        $dd['User'] = 'User :: ผู้ใช้งานทั่วไป';
        foreach ($auth->getRoles() as $row) {
            if($row->name != 'Admin'){
                $dd[$row->name] = $row->name . ' :: ' . $row->description;
            }
            else if($row->name == 'Admin' && Yii::$app->user->id == 1){
                $dd[$row->name] = $row->name . ' :: ' . $row->description;
            }
        }
        return $dd;
    }
    protected function removePermission($id) {
        $auth = Yii::$app->authManager;
        $auth->revokeAll($id);
    }
    
}