<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.18
 * Time: 2:10
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]

                ]
            ]
        ];

    }

}

