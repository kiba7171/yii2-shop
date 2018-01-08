<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10.12.17
 * Time: 14:25
 */

namespace app\models;
use yii\db\ActiveRecord;

class OrderForm extends ActiveRecord
{

    public static function tableName() {
        return '{{order}}';
    }

    public function attributeLabels() {
        return [
            'name' => 'Имя:',
            'email' => 'Email:',
            'address' => 'Адрес:',
            'phone' => 'Телефон:',
            'delivery' => 'Способ доставки:',
            'id' => '',
            'item_id' => '',
            'summ' => '',
        ];
    }

    public function rules() {
        return [
            [ ['email', 'count', 'phone', 'delivery'], 'required'],
            ['email', 'email'],
            ['count', 'number'],
            [['address','name'], 'trim'],
            [['id', 'item_id', 'summ'], 'safe'],
        ];
    }

}