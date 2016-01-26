<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "advert".
 *
 * @property string $id
 * @property integer $price
 * @property string $address
 * @property integer $fk_agent_detail
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $createAt
 * @property integer $ipdatedAt
 */
class Advert extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'fk_agent', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'recommend', 'createAt', 'ipdatedAt'], 'integer'],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['general_image'], 'string', 'max' => 200],
            [['location'], 'string', 'max' => 30],
            //[['type'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'address' => 'Address',
            'fk_agent_detail' => 'Fk Agent Detail',
            'bedroom' => 'Bedroom',
            'livingroom' => 'Livingroom',
            'parking' => 'Parking',
            'kitchen' => 'Kitchen',
            'general_image' => 'General Image',
            'description' => 'Description',
            'location' => 'Location',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recommend' => 'Recommend',
            'createAt' => 'Create At',
            'ipdatedAt' => 'Ipdated At',
        ];
    }

    // beforeValidate
    // afterValidate
    // beforeSave
    // afterSave
    // beforeFind
    // afterFind

    public function afterValidate()
    {
        $this->fk_agent = Yii::$app->user->identity->id;
    }

    public function afterSave()
    {
        Yii::$app->locator->cache->set('id', $this->id);
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
