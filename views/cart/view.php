<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Корзина';
?>
<div class="col-md-12 main-block">
    <?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif ?>

    <?php if(Yii::$app->session->hasFlash('error')):?>
        <div class="alert alert-dunger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif ?>

        <div id="cart-table">
            <?php if (!empty($session['cart'])): ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Наименование</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($session['cart'] as $id => $item ): ?>
                            <tr>
                                <td><?= \yii\helpers\Html::img("@web{$item['img']}", ['alt' => $item['title'], 'height' => 50] ) ?></td>
                                <td><?= $item['title'] ?></td>
                                <td><input type="text" size="3" value="<?= $item['qty'] ?>" data-id="<?= $id?>"></td>
                                <td><?= $item['price'] ?></td>
                                <td><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true" data-id="<?= $id?>"></span></td>
                            </tr>
                        <?php endforeach?>
                        <tr>
                            <td colspan="4">Итого:</td>
                            <td><?= $session['cart.qty']?></td>
                        </tr>
                        <tr>
                            <td colspan="4">На сумму:</td>
                            <td><?= $session['cart.sum']?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            <?php else: ?>
                <h3>Корзина пуста</h3>
            <?php endif; ?>
        </div>
        <br/>
    <?php $form=ActiveForm::begin()?>
    <?= $form->field($order, 'name')?>
    <?= $form->field($order, 'email')?>
    <?= $form->field($order, 'phone')?>
    <?= $form->field($order, 'address')?>
    <?= $form->field($order, 'message')?>
    <?= $form->field($order, 'delivery')->radioList([
        '1' => 'Самовывоз (м.Строгино/м.Щукинская)',
        '2' => 'Курьером по Москве (400р.)',
        '3' => 'Отправка в другие регионы (по полной предоплате)',
    ], ['separator' => '<br/>'])?>
    <?= Html::submitButton('Заказать', ['class' => 'btn btn-success btn-success-cart']) ?>
    <?php ActiveForm::end()?>
</div>
