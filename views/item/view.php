<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Купить ' . $item['title'] . ' в Москве, оригинал';

?>

<div class="main-block col-md-12 item-card">
    <div class="row">
        <div class="col-md-8">
            <?= Html::img($item['img'], ['alt' => $item['title']])?>
        </div>
        <div class="col-md-4">
            <h1><?= $item['title'] ?></h1>
            <h3><?= $item['price'] ?> руб.</h3>
            <p><?= $item['short_description'] ?></p>
            <?php if ($item['status'] == 1): ?>
            <p class="buy-button">
                <a href="<?= URL::to(['cart/add', 'id' => $item['id']])?>" data-id="<?= $item['id']?>" class="btn-new ie_css3 btn-form-popover add-to-cart">
                    <i class="fa fa-shopping-cart">Заказать</i></a>
                <?else :?>
            <p><button class="btn-new ie_css3 btn-form-popover out-of-stock">
                    <i class="fa fa-shopping-cart">Нет в наличии</i></button>
                <? endif ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Описание:</h3>
            <p><?= $item['long_description'] ?></p>
        </div>

    </div>
</div>


<?php
Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal_lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">
    Продолжить покупки</button>' .
        Html::a('Оформить заказ', ['cart/view'], ['class' => 'btn btn-success']) .
        '<button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
]);
Modal::end();
?>