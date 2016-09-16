<?php

namespace app\models;

use yii\base\Model;

class GuestsForm extends Model
{

    public $name;
    public $email;
    public $message;
    public $verifyCode;

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя: *',
            'email' => 'Ваш e-mail: *',
            'message' => 'Текст сообщения: *',
            'verifyCode' => 'Verification Code',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['name', 'message'], 'trim'],
            ['email', 'email'],
//            ['name', 'match', 'pattern' => '/^[a-z]\w*$/i'],
            [ 'name', 'string', 'length' => [3,30] ],
            ['message', 'string', 'length' => [3,1000]],
            ['verifyCode', 'captcha'],
        ];
    }

}
