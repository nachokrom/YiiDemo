<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property string $name
 *
 * @property Zaya[] $zayas
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
        ];
    }

    /**
     * Gets query for [[Zayas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZayas()
    {
        return $this->hasMany(Zaya::class, ['status' => 'name']);
    }
}
