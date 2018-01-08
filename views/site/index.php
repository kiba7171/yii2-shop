<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Купить куклу LOL в шарике в Москве';
?>

<?php if(Yii::$app->session->hasFlash('Success')): ?>
    <script>
        window.onload = function() {
            alert ( "<?php echo Yii::$app->session->getFlash('Success')?>" );
        }
    </script>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('Error')): ?>
    <script>
        window.onload = function() {
            alert ( "<?php echo Yii::$app->session->getFlash('Error')?>" );
        }
    </script>
<?php endif; ?>




<div class="col-md-12 main-block">
    <div>
        <h1>Купить куклы L.O.L</h1>
        <p> Куклы L.O.L - не просто игрушки, а целые наборы из 7 удивительных сюрпризов, скрытых в небольших пластмассовых шарах под слоями яркого полиэтилена.
            Снимая слой за слоем, ребенок получит море приятных эмоций. Ну а главным сюрпризом станет очаровательная куколка.


            Распаковывать такую игрушку сплошное удовольствие. Ведь о том, какой подарок скрывается под каждым слоем можно узнать только после его вскрытия.
            Купите лучший подарок вашему ребенку!</p>
    </div>
    <div>
        <div class="row">
            <?php
        foreach ($items as $item)

        {
            ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <?= Html::img('@web' . $item['img'], ['alt' => $item['title']]) ?>
                <div class="caption">
                    <h3><a href="<?= Url::to(['item/view', 'url' => $item['url'] ]) ?>"><?= $item['title']?></a></h3>
                    <p><?= $item['price'] ?> руб.</p>
                    <p class="buy-button">
                        <?php if ($item['status'] == 1): ?>
                            <a href="<?= URL::to(['cart/add', 'id' => $item['id']])?>" data-id="<?= $item['id']?>" class="btn-new ie_css3 btn-form-popover add-to-cart"><i class="fa fa-shopping-cart">
                                Заказать
                            </i></a>
                        <?else :?>
                            <a class="btn-new ie_css3 btn-form-popover out-of-stock"><i class="fa fa-shopping-cart">
                                    Нет в наличии
                                </i></a>
                        <? endif ?>
                    </p>

                </div>
            </div>
        </div>
        <?php
        }
        ?>
        </div>


        <h2>Как отличить оригинальных кукол LOL от подделки</h2>
        <div class="row">
            <div class="col-sm-6"><img src="img/1-original-diff.png" class="center-block img-responsive img-thumbnail"></div>
            <div class="col-sm-6"><img src="img/2-original-diff.png" class="center-block img-responsive img-thumbnail"></div>
            <div class="row">
                <div class="col-sm-6"><img src="img/3-original-diff.png" class="center-block img-responsive img-thumbnail"></div>
                <div class="col-sm-6"><img src="img/4-original-diff.png" class="center-block img-responsive img-thumbnail"></div>
            </div>
            <div class="row">
                <div class="col-sm-6"><img src="img/5-original-diff.png" class="center-block img-responsive img-thumbnail"></div>
                <div class="col-sm-6"><img src="img/poddelka-vs-original.jpg" class="center-block img-responsive img-thumbnail"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Хотите узнать больше интересного о шариках LOL?<br/> Заходите в нашу группу вконтакте!</h3>
                    </div>
                    <div class="panel-body">
                        <script type="text/javascript" src="//vk.com/js/api/openapi.js?151"></script>
                        <!-- VK Widget -->
                        <div id="vk_groups"></div>
                        <script type="text/javascript">
                            VK.Widgets.Group("vk_groups", {mode: 3, width: "auto", color1: 'F0F1ED'}, 41674093);
                        </script>
                        <p class="">
                            Тут Вы найдете множество фотографий наших куколок и отзывы покупателей.<p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 main-block">
    <div>
        <h2>Что из себя представляют куклы LOL</h2>
        <div class="row">
            <div class="col-md-12">
                <img src="img/text-width.jpg" class="center-block img-responsive">
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">

        <p class="desc">
            Кукольная серия L.O.L Surprise от крупнейшего американского производителя игрушек
            MGA Entertainment появилась в 2016 году и сразу же полюбилась миллионам маленьких
            принцесс
            во всем мире. L.O.L расшифровывается как Lil Outrageous Littles, что в переводе
            означает Маленькие Эпатажные Малышки. А еще это — популярная в интернет-сленге
            аббревиатура
            от словосочетания Laughing Out Loud (Смеюсь Вслух). А это значит, что с нашими
            эпатажными малышками ваш ребенок проведет множество веселых минут!
        </p>

        <p class="desc">
            А под слоями шарика ЛОЛ нас ждут:
        <ol>
            <li>
                Секретное послание-стикер. Оно намекает, какая именно малышка прячется внутри
                шарика.
            </li>
            <li>
                Наклейки-смайлики. Их клеят на специальном коллекционном листе.
            </li>
            <li>
                Дизайнерская бутылочка с ручкой и несъемной крышечкой - соской, через которую
                удобно поить игрушку.
            </li>
            <li>
                Стильная обувь. Она может быть какой угодно: туфельки, кроссовки, сапожки, и в
                любом случае идеально подойдет к кукольному наряду.
            </li>
            <li>
                Оригинальный костюм, идеально подходящий кукле. Бальное платье, рокерский прикид, нарядный сарафан -
                вариантов много и каждый красноречиво говорит о характере его хозяйки.
            </li>
            <li>
                Модный аксессуар. Головной убор, сумочка или ободок сделают стильный образ
                законченным.
            </li>
            <li>
                Сама куколка с огромными, широко распахнутыми выразительными глазками и забавной
                прической.
            </li>
        </ol>
        </p>
        </div>
        <div class="col-md-6">
            <img src="img/text-1.jpg" class="center-block img-responsive img-circle">
        </div>
        </div>
        <h2>Особенности малышек LOL</h2>
        <div class="row">
            <div class="col-md-6">
        <p class="desc">Всего в коллекции 28 малышек ЛОЛ и 45 их функциональных вариаций со
            своим именем и особенностями. Небольшой размер этих очаровательных пупсов (примерно
            9 см) позволяет комфортно
            собрать всю коллекцию: никогда не знаешь, какая из куколок попадется в следующий
            раз, но дети могут меняться ими.
            Все детали игрушки изготовлены из экологически чистого и безопасного пластика.
            Каждая куколка имеет свой приятный запах, например, ванили, корицы, карамели, ручки
            и ножки
            у нее двигаются.
            <br/>
            Всего в коллекции кукол LOL 8 категорий: спортсменки, модницы, гламурные красавицы,
            танцовщицы, певицы, участницы карнавала, противоположности, блестящие малышки и
            серия «ликование».
            В категориях по 5-6 кукол. Все они неповторимы, имеют свое имя, характер и
            способность: плеваться, плакать, писать или менять цвет в холодной воде.
            Сам шар тоже многофункционален. Из одной половинки можно сделать игрушечную ванночку
            или перевернуть ее и получить оригинальную подставку.
            В другой половинке можно уложить куклу спать, или усадить пообедать.
            <br/>
            А если соединить обе половинки вместе и приставить к ним специальную ручку, идущую в
            наборе, шар превратится в симпатичную сумочку.
            Возможностей у куколок LOL - огромное количество, а это значит, что с такой игрушкой ваш
            ребенок никогда не заскучает!
        </p>
            </div>
            <div class="col-md-6">
                <img src="img/text-2.jpg" class="center-block img-responsive img-circle">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 video centering">
            <div class="embed-responsive embed-responsive-16by9 centering">
                <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/xLOOo6LOfoc?rel=0&amp;showinfo=0"
                        frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>


</div>

<div class="col-md-12 main-block">
    <h2>Доставка и самовывоз</h2>
    <a name="delivery"></a>
    <div class="col-md-6">
        <p>Доставка по Москве - 400 рублей.<br/><br/>
        За пределы МКАД - в зависимости от удаленности (уточняйте стоимость по телефону).<br/><br/>
        <b>Бесплатный самовывоз по предварительному бронированию:</b></br>
        - Строгинский бульвар д.1 (м.Строгино).</br>
        - ул. Живописная, д.24 или м.Щукинская.</br></br>

        Доставка в другие регионы службой "EMS" или "Почтой России": от 300 рублей (по полной предоплате).</p>
    </div>
    <div class="col-md-3">
        <img src="img/delivery-1.jpg" class="center-block img-responsive img-thumbnail">
    </div>
    <div class="col-md-3">
        <img src="img/delivery-2.jpg" class="center-block img-responsive img-thumbnail">
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


Милашки - питомцы кукол ЛОЛ Сюрприз наконец-то можно найти на прилавках магазинов. Подарочная серия вышла под названием L.O.L. Surprise Pets.
В желтых шариках прячутся четыре домашних питомца: собачки, котики, кролики и исключительно редкие – хомячки.
Внешностью и стилем питомцы очень похожи на старшую куколку из серии ЛОЛ Сюрприз.<br/><br/>
Собирать коллекцию вдвойне приятней, ведь каждая старшая сестра ожидает воссоединения со своей <a href="http://hatchimals-toy.ru/item/lil-2series-original">младшей сестричкой</a>, а также любимой домашней зверушкой.
Первая серия L.O.L. SurprisePets содержит 35 коллекционных игрушек. Каждая зверушка из коллекции имеет в наборе персональный аксессуар. Так, у кошечки ЛОЛ Сюрприз есть совочек для лотка и очки. Также среди комплектов можно встретить шляпки, обувь и бутылочки. Каждый аксессуар показывает старшую сестричку ЛОЛ, которая является хозяином домашней зверушки.




http://192.168.64.2/item/lil-2series-original