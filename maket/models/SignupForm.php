<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
 
class SignupForm extends Model{
    
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    
    public function rules() {
        return [
            [['email', 'password', 'first_name', 'last_name'], 'required', 'message' => 'Пожалуйста, заполните поле'],
            ['email', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
        ];
    }

    public function save()
    {
        $user = new User();
        $user->email = $this->email;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        return $user->save();
    }
    
}