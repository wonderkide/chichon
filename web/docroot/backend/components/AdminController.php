<?php
 
namespace backend\components;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
 
class AdminController extends Controller {
    
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                [
                    'allow'=>true,
                    'roles'=>['Author']
                ],
                
              ]
            ],
        ];
    }

    
    public function init() {
        
    }
    public function beforeAction($view) {
        
        return parent::beforeAction($view);
    }
    
    public function checkPermission(){
        if(!Yii::$app->user->isGuest){
            $is_assignment = $this->findAssignment(Yii::$app->user->id);
            if(!$is_assignment){
                Yii::$app->user->logout();
                return $this->redirect('/site/login');
            }
        }
    }
    
    public function findAssignment($id, $role = null){
        $auth = Yii::$app->authManager;
        if($role){
            $is_assignment = $auth->getAssignment($role, $id);
        }else{
            $is_assignment = $auth->getAssignments($id);
        }
        return $is_assignment;
    }
    
    public function notAllowed() {
        throw new \yii\web\HttpException(403, 'You are not allowed to perform this action.');
    }
}