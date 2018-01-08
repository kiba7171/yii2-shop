<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20.12.17
 * Time: 14:46
 */

namespace app\controllers;

use app\models\Cart;
use Yii;
use yii\web\Controller;
use app\models\Items;
use app\models\OrderItems;
use app\models\Order;


class CartController extends Controller{

    public function actionAdd() {
        $id = Yii::$app->request->get('id');
        $item = Items::findOne($id);
        if(empty($item)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = New Cart();
        $cart->addToCart($item);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear() {
        $session = Yii::$app->session;
        if (!empty($session)):
            $session->remove('cart');
            $session->remove('cart.qty');
            $session->remove('cart.sum');
            endif;
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem() {
        $id = (int)Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = New Cart();
        $cart->delItem($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionUpdQty() {
        $id = (int)Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $session = Yii::$app->session;
        $session->open();
        $cart = New Cart();
        $cart->updQty($id, $qty);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView() {
        $session = Yii::$app->session;
        $session->open();
        $order = New order();
        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if($order->save()) {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->mailer->compose('order', ['session' => $session['cart'], 'order'=>$order])
                    ->setFrom(['manager@hatchimals-toy.ru' => 'Магазин игрушек L.O.L'])
                    ->setTo('stat7955124@ya.ru')
                    ->setSubject('Заказ ' . $order->id)
                    ->send();

                Yii::$app->mailer->compose('confirm', ['session' => $session['cart'], 'order'=>$order])
                    ->setFrom(['manager@hatchimals-toy.ru' => 'Магазин игрушек L.O.L'])
                    ->setTo($order->email)
                    ->setSubject('Подтверждение вашего заказа')
                    ->send();
                Yii::$app->session->setFlash('success', 'Ваш заказ принят');

                if (!empty($session)):
                    $session->remove('cart');
                    $session->remove('cart.qty');
                    $session->remove('cart.sum');
                endif;

                return $this->refresh();
            }else {
                Yii::$app->session->setFlash('error', 'Возникла ошибка, заказ не принят');

            }
        }
        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems($items, $order_id) {
        foreach($items as $id => $item){
            $order_items = New OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->title = $item['title'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty']*$item['price'];
            $order_items->save();
        }
    }

}