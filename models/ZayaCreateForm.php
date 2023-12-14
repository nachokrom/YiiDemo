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
class ZayaCreateForm extends Zaya
{
   
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number_auto', 'comment', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['number_auto', 'comment', 'status'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status' => 'name']],
        ];
    }

}
