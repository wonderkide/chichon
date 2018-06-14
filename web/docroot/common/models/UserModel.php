<?php
namespace common\models;

use Yii;
use yii\imagine\Image;
use app\models\MainDataModel;
/**
 * This is the model class for table "db_user".
 *
 * @property integer $id
 * @property integer $id_rank
 * @property integer $exp
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $nickname
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserModel extends \yii\db\ActiveRecord {
    
    public $password;
    public $imageFile;
    public $role;
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'/*, 'image'*/, 'image_crop'], 'string', 'max' => 255],
            //[['nickname'], 'string', 'max' => 128],
            //['nickname', 'allowNickname'],
            [['auth_key','role'], 'string', 'max' => 32],
            //[['zeny'], 'number'],
            [['email'], 'email'],
            ['email', 'emailAlready'],
            //[['role'], 'string', 'max' => 32],
            //['email', 'unique', 'targetClass' => 'common\models\User', 'message' => 'This username has already been taken.'],
            //['imageFile', 'file', 'extensions' => 'jpeg, gif, png, jpg', 'on' => ['insert', 'update']],
            [['imageFile'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'jpg, gif, png'],
            
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'nickname' => 'นามแฝง',
            'status' => 'Status',
            'created_at' => 'วันที่เข้าร่วม',
            'updated_at' => 'แก้ไขข้อมูลล่าสุด',
            'permission' => 'ระดับการเข้าถึง',
            'image' => 'image',
            'image_crop' => 'image_crop',
            'imageFile' => 'อัพโหลดรูปโปรไฟล์',
            'id_rank' => 'ยศ',
            'exp' => 'ค่าประสบการณ์',
        ];
    }
    
    public function emailAlready($attribute, $params) {
        $model = UserModel::find()->select('email')->where('id != :id', ['id'=>  $this->id])->all();
        $email = [];
        foreach ($model as $row) {
            array_push($email, $row->email);
        }
        if (in_array($this->$attribute, $email)) {
            $this->addError($attribute, 'Email นี้ได้ถูกใช้ไปแล้ว.');
        }
    }
    
    public function allowNickname($attribute, $params) {
        $model = MainDataModel::find()->where(['type'=>'allowuser'])->one();
        
        $not = explode(',', $model->content);
        foreach ($not as $value) {
            if(is_numeric(strpos($this->$attribute, $value))){
                $this->addError($attribute, 'คุณไม่สามารถใช้งานชื่อเล่นนี้ได้.');
            }
            
        }
        $user = UserModel::find(['usernam','nickname'])->where('id != :id', ['id'=>  $this->id])->all();
        $name = [];
        foreach ($user as $row) {
            array_push($name, $row->username);
            array_push($name, $row->nickname);
        }
        if (in_array($this->$attribute, $name)) {
            $this->addError($attribute, 'ชื่อนี้ได้ถูกใช้ไปแล้ว.');
        }
    }
    
    
    public function upload($path, $name) {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::$app->basePath .'/web'. $path . $name);
            list($width, $height) = getimagesize(Yii::$app->basePath .'/web'. $path . $name);
            
            if($width > 400){
                $reduce_scale = floor($width/300);
                $newWidth = floor($width/$reduce_scale);
                $newHeight = floor($height/$reduce_scale);
                Image::thumbnail(Yii::$app->basePath .'/web'. $path . $name, $newWidth, $newHeight )
                ->save(Yii::getAlias(Yii::$app->basePath .'/web'. $path . $name), ['quality' => 80]);
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    public function delImage($path) {
        //unlink(getcwd().$path);
        if(file_exists(getcwd().$path)){
            unlink(getcwd().$path);
        }
        //unlink(getcwd().$path.$name);
    }
    
    public function getUsername($id) {
        $model = UserModel::findOne($id);
        return $model->username;
    }
    
    public function getName($id){
        $model = UserModel::findOne($id);
        if($model && $model->nickname){
            return $model->nickname;
        }
        return $model->username;
    }
    
    public function getUserByName($name) {
        $model = UserModel::find()->where(['or',
            ['username'=> $name],
            ['nickname'=> $name]])->one();
        if($model){
            return $model;
        }
        return FALSE;
    }
}