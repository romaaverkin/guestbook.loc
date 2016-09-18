<?php

namespace app\models;

use yii\db\ActiveRecord;

//use yii\base\Model;

class GuestsForm extends ActiveRecord
{

//    public $name;
//    public $email;
//    public $message;
//    public $verifyCode;
    public static function tableName()
    {
        return 'post';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя: *',
            'email' => 'Ваш e-mail: *',
            'post' => 'Текст сообщения: *',
//            'verifyCode' => 'Verification Code',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'email', 'post'], 'required'],
            [['name', 'post'], 'trim'],
            ['email', 'email'],
//            ['name', 'match', 'pattern' => '/^[a-z]\w*$/i'],
            [ 'name', 'string', 'length' => [3, 30]],
            ['post', 'string', 'length' => [3, 1000]],
//            ['verifyCode', 'captcha'],
        ];
    }

}
