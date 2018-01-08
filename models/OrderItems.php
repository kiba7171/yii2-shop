<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $title
 * @property double $price
 * @property integer $qty_item
 * @property double $sum_item
 */
class OrderItems extends ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    public function getOrder(){
        return $this->hasOne(OrderItems::class, ['id' => 'order_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'title', 'price', 'qty_item', 'sum_item'], 'required'],
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['title'], 'string', 'max' => 225],
        ];
    }

}