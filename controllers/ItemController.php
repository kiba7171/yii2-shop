<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.18
 * Time: 21:20
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Items;
use Yii;

class ItemController extends Controller {
    public function actionView() {
        $url = Yii::$app->request->get('url');
        $item = items::findOne(['url' => $url]);

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Купить ' . $item['title'] . ' оригинал, по выгодной цене.
        Быстрая доставка по Москве и всей России! Интернет-магазин сертифицированных игрушек MGA Entertainment',
        ]);

        return $this->render('view', compact('item'));

    }

}