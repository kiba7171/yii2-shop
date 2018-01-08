<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $delivery
 * @property integer $qty
 * @property string $created_at
 * @property string $message
 * @property double $sum
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    public function getOrderItems(){
        return $this->hasMany(OrderItems::class, ['order_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'address', 'delivery', 'email'], 'required'],
            [['delivery', 'qty'], 'integer'],
            [['created_at'], 'safe'],
            [['sum'], 'number'],
            [['name', 'email', 'address', 'message'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'delivery' => 'Способ доставки',
            'message' => 'Примечание',
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}