<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $summ
 * @property int $state
 * @property string $date
 * @property string $user_id
 * @property string $address_id
 * @property string $phone
 * @property string $shipping
 * @property string $payment
 * @property string $products
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['summ', 'state', 'date', 'user_id', 'address_id', 'phone', 'shipping', 'payment', 'products'], 'required'],
            [['summ'], 'number'],
            [['state', 'date', 'user_id', 'address_id'], 'integer'],
            [['products'], 'string'],
            [['phone'], 'string', 'max' => 16],
            [['shipping', 'payment'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'summ' => 'Summ',
            'state' => 'State',
            'date' => 'Date',
            'user_id' => 'User ID',
            'address_id' => 'Address ID',
            'phone' => 'Phone',
            'shipping' => 'Shipping',
            'payment' => 'Payment',
            'products' => 'Products',
        ];
    }

    // все товары заказа
    public function getItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id'])->with('products');
    }

    // получить адрес заказа
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }



}
