<?php

namespace app\models;

use yii\db\ActiveRecord;

class GuestsForm extends ActiveRecord
{

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
        ];
    }

    public function rules()
    {
        return [
            [['name', 'email', 'post'], 'required'],
            [['name', 'post'], 'trim'],
            ['email', 'email'],
            [ 'name', 'string', 'length' => [3, 30]],
            ['post', 'string', 'length' => [3, 1000]],
        ];
    }

}
