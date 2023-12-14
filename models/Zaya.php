<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zaya".
 *
 * @property int $id
 * @property int $user_id
 * @property string $number_auto
 * @property string $comment
 * @property string $status
 *
 * @property Status $status0
 * @property User $user
 */
class Zaya extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zaya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'number_auto', 'comment', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['number_auto', 'comment', 'status'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'number_auto' => 'Номер',
            'comment' => 'Коментарий',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::class, ['name' => 'status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
