<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Подтверждение заказа</title>
</head>
<body>

            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container9010b9cb4eeeb9730b21a1b3ee1b9cbf" style="background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:3px !important;">
                            <tbody><tr>
                                <td align="center" valign="top">

                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header2d76e9fdbe731941c87233c48e36fba8" style="background-color:#557da1;border-radius:3px 3px 0 0 !important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;"><tbody><tr>
                                            <td id="header_wrappercc4311edf6e8c7f28051082349bc7cfb" style="padding:36px 48px;display:block;">
                                                <h1 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;">Новый заказ клиента</h1>
                                            </td>
                                        </tr></tbody></table>

                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">

                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_bodyf92a8678a938bbb27feadf7abc362964"><tbody><tr>
                                            <td valign="top" id="body_content07f223c193879a90cb83fb51aae48886" style="background-color:#fdfdfd;">

                                                <table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
                                                        <td valign="top" style="padding:48px 48px 0;">
                                                            <div id="body_content_innerc15939091a9e6e53ff43efc110db2017" style="color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left;">

                                                                <p style="margin:0 0 16px;">Вы получили заказ от <?= $order->name ?>.
                                                                    Детали заказа:</p>


                                                                <h2 style="color:#557da1;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left;">
                                                                    Заказ #<?= $order->id ?> (<?= date("Y-m-d H:i:s") ?>)</h2>

                                                                <div style="margin-bottom:40px;">
                                                                    <table cellspacing="0" cellpadding="6" style="width:100%;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;color:#737373;border:1px solid #e4e4e4;" border="1">
                                                                        <thead><tr>
                                                                            <th scope="col" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Товар</th>
                                                                            <th scope="col" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Количество</th>
                                                                            <th scope="col" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Цена</th>
                                                                        </tr></thead>
                                                                        <tbody>
                                                                        <?php
                                                                        foreach ($session as $products => $product){
                                                                            echo '<tr><td style="text-align:left;vertical-align:middle;border:1px solid #eee;color:#737373;padding:12px;">'
                                                                                . $product['title'] . '</td>'
                                                                                . '<td style="text-align:left;vertical-align:middle;border:1px solid #eee;color:#737373;padding:12px;">'
                                                                                . $product['qty'] . '</td>'
                                                                                . '<td style="text-align:left;vertical-align:middle;border:1px solid #eee;color:#737373;padding:12px;"><span>'
                                                                                . $product['price'] . 'руб.</span></td></tr>';


                                                                        }?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr>
                                                                            <th scope="row" colspan="2" style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px;">Подытог:</th>
                                                                            <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px;"><span><?= $order->sum ?>руб.</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row" colspan="2" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Доставка:</th>
                                                                            <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">
                                                                                <span>
                                                                                    <?php
                                                                                    switch ($order->delivery){
                                                                                        case 1:
                                                                                            echo "\r\nСамовывоз";
                                                                                            break;
                                                                                        case 2:
                                                                                            echo "\r\nДоставка по Москве";
                                                                                            break;
                                                                                        case 3:
                                                                                            echo "\r\nДоставка почтой";
                                                                                            break;
                                                                                    }
                                                                                    ?>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row" colspan="2" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Способ оплаты:</th>
                                                                            <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Наличными</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row" colspan="2" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Всего:</th>
                                                                            <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;"><span> Здесь должна быть сумма!  </span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row" colspan="2" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;">Примечание:</th>
                                                                            <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px;"><?= $order->message ?></td>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>

                                                                <table id="addressesa46cf2cfe53cb30a17e95a984ce7dfd2" cellspacing="0" cellpadding="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0;" border="0"><tbody><tr>
                                                                        <td style="text-align:left;border:0;padding:0;" valign="top" width="50%">
                                                                            <h2 style="color:#557da1;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left;">Платёжный адрес</h2>

                                                                            <address style="padding:12px 12px 0;color:#737373;border:1px solid #e4e4e4;">
                                                                                <?= $order->name ?> <br /><?= $order->address ?><br /><span class="wmi-callto"><?= $order->phone ?></span>
                                                                                <p style="margin:0 0 16px;"><a href="mailto:Vrs@urals.pro"><?= $order->email ?></a></p>
                                                                            </address>
                                                                        </td>
                                                                    </tr></tbody></table>
                                                                <div style="padding:12px 12px 0;color:#737373;border:1px solid #e4e4e4;"></div>															</div>
                                                        </td>
                                                    </tr></tbody></table>

                                            </td>
                                        </tr></tbody></table>

                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">

                                    <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer5ac60d61b19fd1781094b6e79debfaf4"><tbody><tr>
                                            <td valign="top" style="padding:0;">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
                                                        <td colspan="2" valign="middle" id="credit1f7e822cedee49c26d210ed071643f0b" style="padding:0 48px 48px 48px;border:0;color:#99b1c7;font-family:Arial;font-size:12px;line-height:125%;text-align:center;">

                                                        </td>
                                                    </tr></tbody></table>
                                            </td>
                                        </tr></tbody></table>

                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr></tbody></table>
</body>
</html>
