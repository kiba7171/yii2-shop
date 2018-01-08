<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контактная информация - официальный магазин кукол LOL';
?>
<div class="col-md-12 main-block">
    <div>
        <h1>Наши контакты</h1>
        <p style="text-align: center;">
            Вы можете связаться с нами по этим данным ​и мы обязательно ответим!<br/>
            Телефон:<br/>
            +7(495)201-12-35<br/>
            <a href="whatsapp://send/?phone=79067778292" title="WhatsApp: 79067778292" style="color: green;">WhatsApp:<br/>
                +7(906)777-82-92</a><br/>
            Email:<br/>
            <a href="mailto:manager@hatchimals-toy.ru">manager@hatchimals-toy.ru</a><br/><br/>
            Адрес:<br/>
            ​г.Москва, Строгинский бульвар, 1
        </p>
    </div>
    <h2>Форма обратной связи</h2>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Спасибо что написали нам. Мы ответим в ближайшее время!
        </div>

    <?php else: ?>

        <p>
            Если у Вас есть вопросы, замечания или предложения по нашей работе - пожалуйста заполните эту форму. Спасибо!
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
