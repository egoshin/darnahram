<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "default", Array(
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                "SITE_ID" => "s2",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
            ),
                false
            );?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h1><?=$title?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="map img-responsive">
                <?=$yandexMap?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="contacts">
                <h3><?=GetMessage("CONTACTS_ADDRESS")?></h3>
                <p><?=$address?></p>
                <h3><?=GetMessage("CONTACTS_OPENING_HOURS")?></h3>
                <?=$openingHours;?>
                <h3><?=GetMessage("CONTACTS_LOCATION")?></h3>
                <?=$locationMap?>
                <h3><?=GetMessage("CONTACTS_OUR_CONTACTS")?></h3>
                <p>
                    <span class="ff-condensed"><?=GetMessage("CONTACTS_PHONE")?></span> <br class="visible-xs"><a href="tel:+<?=preg_replace("#[^\d]#", "", $phone)?>"><?=$phone?></a><br>
                    <span class="ff-condensed"><?=GetMessage("CONTACTS_EMAIL2")?></span> <br class="visible-xs"><a href="mailto:<?=$email;?>"><?=$email;?></a>
                </p>
                <h3><?=GetMessage("CONTACTS_SOCIAL")?></h3>
                <p class="small"><a href="<?=$facebook?>" target="_blank"><i class="fa fa-facebook fa-lg"></i><?=GetMessage("CONTACTS_FACEBOOK")?></a></p>
                <p class="small"><a href="<?=$twitter?>" target="_blank"><i class="fa fa-twitter fa-lg"></i><?=GetMessage("CONTACTS_TWITTER")?></a></p>
                <p class="small"><a href="<?=$youtube?>" target="_blank"><i class="fa fa-youtube fa-lg"></i><?=GetMessage("CONTACTS_YOUTUBE")?></a></p>
            </div>
        </div>
        <div class="col-xs-12 col-md-offset-1 col-md-6">
            <h3 class="col-xs-12 col-md-offset-3 col-md-9 text-center"><?=GetMessage("MAINPAGE_HEADER_WRITEME")?></h3>
            <div class="feedback">
                <?$APPLICATION->IncludeComponent("custom:main.feedback", "main", Array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "EMAIL_TO" => $email,	// E-mail, на который будет отправлено письмо
                    "EVENT_MESSAGE_ID" => "",	// Почтовые шаблоны для отправки письма
                    "OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
                    "REQUIRED_FIELDS" => "",	// Обязательные поля для заполнения
                    "USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
                ),
                    false
                );?>
            </div>
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>