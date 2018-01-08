<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\OrderForm;
use app\models\Items;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new OrderForm ();

        if ( $model->load( Yii::$app->request->post() )){


            if ( $model->save() ){
                Yii::$app->mailer->compose('order', ['model' => $model])
                    ->setFrom(['manager@hatchimals-toy.ru' => 'Магазин игрушек L.O.L'])
                    ->setTo('stat7955124@ya.ru')
                    ->setSubject('Заказ')
                    ->send();

                Yii::$app->mailer->compose('confirm', ['model' => $model])
                    ->setFrom(['manager@hatchimals-toy.ru' => 'Магазин игрушек L.O.L'])
                    ->setTo($model->email)
                    ->setSubject('Подтверждение вашего заказа')
                    ->send();

                Yii::$app->session->setFlash('Success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('Error', 'Ошибка!');
            }
        }
        
        $items = Items::find()->all();
        
        
        Yii::$app->view->registerMetaTag([
        'name' => 'description',
        'content' => 'Купить оригинальные куклы LOL в шаре по хорошей цене, можно у нас.
        Экспресс доставка по Москве и всей России! Интернет-магазин оригинальных игрушек MGA Entertainment',
        ]);
    	
    	Yii::$app->view->registerMetaTag([
        'name' => 'keywords',
        'content' => 'LOL Surprise, купить куклу лол, кукла LOL, сюрприз в шаре, кукла в шаре'
    	]);

    	
        return $this->render('index', compact('model', 'items'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        $items = Items::find()->all();

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Форма обратной связи для наших клиентов',
        ]);

        return $this->render('contact', [
            'model' => $model, 'items' => $items
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
