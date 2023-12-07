<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $fio
 * @property string $phone
 * @property string $email
 *
 * @property Zaya[] $zayas
 */
class Regform extends User
{
    public function rules()
    {
        return [
            [['login', 'password', 'fio', 'phone', 'email'], 'required', 'message'=>'Поле обязательно для заполнения'],
            [['fio'], 'match', 'pattern'=>'/^[А-Яа-я\s\-]{5,}$/u', 'message'=>'Можно использовать только кириллицу'],
            [['login'], 'unique', 'message'=>'Такой логин уже используется'],
            [['phone'], 'match', 'pattern'=>'/^([+]?[\s0-9]+)?(\d{3}|[(]?[0-9]+[)])?([-]?[\s]?[0-9])+$/', 'message'=>'Введите телефон в требуемом формате'],
            [['email'], 'email', 'message'=>'Введите адрес электронной почты в требуемом формате'],
            [['password'], 'string', 'min'=> 6, 'message'=>'Пароль должен быть от 6 символов'],
            [['login', 'password', 'fio', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'fio' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Email',
        ];
    }



}
