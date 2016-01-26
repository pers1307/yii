<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscribe".
 *
 * @property integer $id
 * @property string $email
 * @property string $date_subscribe
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date_subscribe'], 'required'],
            [['id'], 'integer'],
            [['date_subscribe'], 'safe'],
            [['email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'date_subscribe' => 'Date Subscribe',
        ];
    }

    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }
}
