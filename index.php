<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
if (CModule::IncludeModule("iblock")):
    $arSelect = Array("DETAIL_TEXT");
    $arFilter = Array("ID" => 2717, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    if ($arFields = $res->GetNext()):
        if($arFields["DETAIL_TEXT"]):?>
            <div class="announcement">
                <?=$arFields["DETAIL_TEXT"];?>
            </div>
        <? endif;
    endif;
endif; ?>
<div class="row">
    <div class="col-xs-12 col-lg-8">
        <h2 class="text-center"><?= GetMessage("MAINPAGE_HEADER_SHEDULE") ?></h2>
        <div class="bx-newslist-block">
            <?
            if (CModule::IncludeModule("iblock")):
                $arSelect = Array("NAME", "PREVIEW_PICTURE", "PROPERTY_date", "PROPERTY_holiday", "PROPERTY_service_time_1",
                    "PROPERTY_service_add_1", "PROPERTY_service2", "PROPERTY_service_time_2", "PROPERTY_service_add_2",
                    "PROPERTY_service3", "PROPERTY_service_time_3", "PROPERTY_service_add_3", "PROPERTY_holiday_description",
                    "PROPERTY_bottom");
                $arFilter = Array("IBLOCK_ID" => 2, "ACTIVE" => "Y", ">=PROPERTY_date" => date('Y-m-d'));
                $arOrder = Array("PROPERTY_date" => "ASC");
                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                $count = 1;
                while ($arFields = $res->GetNext()):
                    $icon = CFile::GetFileArray($arFields["PREVIEW_PICTURE"]);
                    $date = $arFields["PROPERTY_DATE_VALUE"];
                    setlocale(LC_ALL, 'ru_RU.UTF-8');
                    $week = strftime("%A", strtotime($date));
                    if ($arFields["PROPERTY_HOLIDAY_VALUE"] == "Да") {
                        $fontColor = "#a94442";
                    } else {
                        $fontColor = "#31708f";
                    }
                    if ($week == "Воскресенье") {
                        $panelColor = "panel-danger";
                        $fontColor = "#a94442";
                    } else {
                        $panelColor = "panel-default";
                    }
                    ?>
                    <div class="panel <?=$panelColor?>">
                        <div class="panel-heading">
                            <h3 class="panel-title bold ff-izhitsa" style="color: <?=$fontColor?>;"><?=$date?>. <?=$week?>.<br><?=$arFields["PROPERTY_HOLIDAY_DESCRIPTION_VALUE"]["TEXT"]?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 hidden-xs hidden-sm">
                                    <img class="img-responsive" src="<?=$icon["SRC"]?>" alt="<?=$icon["DESCRIPTION"]?>">
                                </div>
                                <div class="col-xs-12 col-md-10">
                                    <div class="row">
                                        <div class="col-xs-3 col-lg-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_1_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-9 col-lg-4">
                                            <p class="bold ff-izhitsa"><?=$arFields["NAME"]?></p>
                                        </div>
                                        <div class="col-xs-12 col-lg-6">
                                            <p class="ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_ADD_1_VALUE"]["TEXT"]?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 col-lg-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_2_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-9 col-lg-4">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE2_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-12 col-lg-6">
                                            <p class="ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_ADD_2_VALUE"]["TEXT"]?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 col-lg-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_3_VALUE"]?></p>
                                        </div>
                                        <div class="ccol-xs-9 col-lg-4">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE3_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-12 col-lg-6">
                                            <p class="ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_ADD_3_VALUE"]["TEXT"]?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-danger ff-izhitsa" style="color: <?=$fontColor?>;"><?=$arFields["PROPERTY_BOTTOM_VALUE"]["TEXT"]?></div>
                    </div>
                    <?
                    $count++;
                    if ($count > 2) break;
                    //if($week == "Воскресенье") break;
                endwhile;
            endif;
            ?>
            <div class="text-right">
                <a href="<?= SITE_DIR ?>schedule/" role="button">
                    <?= GetMessage("BTN_SCHEDULE_SERVICE_FULL") ?>&nbsp;<i class="fa fa-angle-double-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-4">
        <h2 class="text-center"><?= GetMessage("MAINPAGE_HEADER_EVENTS") ?></h2>
        <? $APPLICATION->IncludeComponent("bitrix:news.list", "events-mainpage", Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",    // Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
            "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",    // Учитывать права доступа
            "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
            "CACHE_TYPE" => "A",    // Тип кеширования
            "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
            "COMPONENT_TEMPLATE" => "events",
            "DETAIL_URL" => "#SITE_DIR#/events/#ELEMENT_ID#/",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
            "DISPLAY_DATE" => "Y",    // Выводить дату элемента
            "DISPLAY_NAME" => "Y",    // Выводить название элемента
            "DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
            "FIELD_CODE" => array(    // Поля
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",    // Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "7",    // Код информационного блока
            "IBLOCK_TYPE" => "-",    // Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
            "MEDIA_PROPERTY" => "",    // Свойство для отображения медиа
            "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "1",    // Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
            "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",    // Название категорий
            "PARENT_SECTION" => "",    // ID раздела
            "PARENT_SECTION_CODE" => "",    // Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(    // Свойства
                0 => "",
                1 => "",
            ),
            "SEARCH_PAGE" => "/search/",    // Путь к странице поиска
            "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",    // Устанавливать статус 404
            "SET_TITLE" => "N",    // Устанавливать заголовок страницы
            "SHOW_404" => "N",    // Показ специальной страницы
            "SLIDER_PROPERTY" => "",
            "SORT_BY1" => "PROPERTY_UP_IS_ANNOUNCEMENT",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "DESC",    // Направление для первой сортировки новостей
            "TEMPLATE_THEME" => "blue",    // Цветовая тема
            "USE_RATING" => "N",    // Разрешить голосование
            "USE_SHARE" => "Y",    // Отображать панель соц. закладок
            "SHARE_TEMPLATE" => "main",    // Шаблон компонента панели соц. закладок
            "SHARE_HANDLERS" => array(    // Используемые соц. закладки и сети
                0 => "vk",
                1 => "facebook",
                2 => "twitter",
            ),
            "SHARE_SHORTEN_URL_LOGIN" => "",    // Логин для bit.ly
            "SHARE_SHORTEN_URL_KEY" => "",    // Ключ для для bit.ly
        ),
            false
        ); ?>
    </div>
</div>
<div class="row">
    <? $APPLICATION->IncludeComponent("bitrix:news.list", "sunday-main", Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
        "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
        "AJAX_MODE" => "N",    // Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
        "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",    // Учитывать права доступа
        "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
        "CACHE_TYPE" => "A",    // Тип кеширования
        "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
        "COMPONENT_TEMPLATE" => "events",
        "DETAIL_URL" => "#SITE_DIR#/sunday-sheets/#ELEMENT_ID#/",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
        "DISPLAY_DATE" => "Y",    // Выводить дату элемента
        "DISPLAY_NAME" => "Y",    // Выводить название элемента
        "DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
        "FIELD_CODE" => array(    // Поля
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",    // Фильтр
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
        "IBLOCK_ID" => "8",    // Код информационного блока
        "IBLOCK_TYPE" => "-",    // Тип информационного блока (используется только для проверки)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
        "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
        "MEDIA_PROPERTY" => "",    // Свойство для отображения медиа
        "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
        "NEWS_COUNT" => "2",    // Количество новостей на странице
        "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
        "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
        "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
        "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
        "PAGER_TITLE" => "Новости",    // Название категорий
        "PARENT_SECTION" => "",    // ID раздела
        "PARENT_SECTION_CODE" => "",    // Код раздела
        "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
        "PROPERTY_CODE" => array(    // Свойства
            0 => "THOUGHTS",
            1 => "number",
            2 => "",
        ),
        "SEARCH_PAGE" => "/search/",    // Путь к странице поиска
        "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
        "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
        "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "N",    // Устанавливать статус 404
        "SET_TITLE" => "N",    // Устанавливать заголовок страницы
        "SHOW_404" => "N",    // Показ специальной страницы
        "SLIDER_PROPERTY" => "",
        "SORT_BY1" => "PROPERTY_UP_IS_ANNOUNCEMENT",
        "SORT_BY2" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "DESC",    // Направление для первой сортировки новостей
        "TEMPLATE_THEME" => "blue",    // Цветовая тема
        "USE_RATING" => "N",    // Разрешить голосование
        "USE_SHARE" => "Y",    // Отображать панель соц. закладок
        "SHARE_TEMPLATE" => "main",    // Шаблон компонента панели соц. закладок
        "SHARE_HANDLERS" => array(    // Используемые соц. закладки и сети
            0 => "vk",
            1 => "facebook",
            2 => "twitter",
        ),
        "SHARE_SHORTEN_URL_LOGIN" => "",    // Логин для bit.ly
        "SHARE_SHORTEN_URL_KEY" => "",    // Ключ для для bit.ly
    ),
        false
    ); ?>
</div>
<div class="row">
    <div class="col-xs-12 col-lg-4">
        <h2 class="text-center"><?= GetMessage("MAINPAGE_HEADER_CATECHISM") ?></h2>
        <div class="bx-newslist-block">
            <?
            if (CModule::IncludeModule("iblock")):
                $arSelect = Array("ID", "NAME", "PICTURE", "SECTION_PAGE_URL");
                $arFilter = Array("ACTIVE" => "Y", "IBLOCK_ID" => 6);
                $arOrder = Array("SORT" => "ASC");
                $arSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect, false);
                while ($arSect_res = $arSect->GetNext()):
                    if($arSect_res["ID"] == 51):?>
                        <?$imgSect = CFile::GetFileArray($arSect_res["PICTURE"]);?>
                        <img class="img-responsive" src="<?= $imgSect["SRC"] ?>" alt="<?= $imgSect["DESCRIPTION"] ?>">
                    <? endif; ?>
                    <a href="<?=$arSect_res['SECTION_PAGE_URL'];?>">
                        <h3><?=$arSect_res['NAME'];?></h3>
                    </a>
                <? endwhile;
            endif;
            ?>
            <div class="text-right btn-video">
                <a href="<?= SITE_DIR ?>catechism/">
                    <?= GetMessage("BTN_CATECHISM") ?>&nbsp;<i class="fa fa-angle-double-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-8">
        <h2 class="text-center"><?= GetMessage("MAINPAGE_HEADER_VIDEO") ?></h2>
        <div class="bx-newslist-block">
            <?
            if (CModule::IncludeModule("iblock")):
                $arSelect = Array("NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PROPERTY_url");
                $arFilter = Array("IBLOCK_ID" => 4, "ACTIVE" => "Y");
                $arOrder = Array("DATE_ACTIVE_FROM" => "DESC");
                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                if ($ar_res = $res->GetNext()):
                    $arDATE = ParseDateTime($ar_res["DATE_ACTIVE_FROM"], FORMAT_DATETIME);
                    $date = (int)$arDATE["DD"] . " " . ToLower(GetMessage("MONTH_" . intval($arDATE["MM"]) . "_S")) . " " . $arDATE["YYYY"] . " года";
                    ?>
                    <h3 class="text-center"><?= $ar_res["NAME"] ?></h3>
                    <p class="text-right" style="margin-bottom: 0;"><i class="fa fa-calendar"></i> <?= $date ?>
                    </p>
                    <div class="embed-responsive embed-responsive-16by9 video">
                        <?= $ar_res["~PROPERTY_URL_VALUE"] ?>
                    </div>
		    <div style="margin-top: 10px;">
                            <?= $ar_res["PREVIEW_TEXT"]; ?>
                    </div>
                <? endif;
            endif;
            ?>
            <div class="text-right btn-video">
                <a href="<?= SITE_DIR ?>videos/">
                    <?= GetMessage("BTN_VIDEO_OTHER") ?>&nbsp;<i class="fa fa-angle-double-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h2 class="text-center"><?= GetMessage("MAINPAGE_HEADER_FOTO") ?></h2>
        <div class="bx-newslist-block">
            <? $APPLICATION->IncludeComponent(
                "bitrix:photogallery",
                "mainpage",
                array(
                    "ADDITIONAL_SIGHTS" => array(),
                    "ALBUM_PHOTO_SIZE" => "600",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "COMPONENT_TEMPLATE" => "main",
                    "DATE_TIME_FORMAT_DETAIL" => "d.m.Y",
                    "DATE_TIME_FORMAT_SECTION" => "d.m.Y",
                    "DRAG_SORT" => "Y",
                    "ELEMENTS_PAGE_ELEMENTS" => "30",
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "IBLOCK_ID" => "5",
                    "IBLOCK_TYPE" => "photogallery",
                    "JPEG_QUALITY" => "100",
                    "JPEG_QUALITY1" => "100",
                    "ORIGINAL_SIZE" => "1280",
                    "PAGE_NAVIGATION_TEMPLATE" => "main",
                    "PATH_TO_FONT" => "default.ttf",
                    "PATH_TO_USER" => "",
                    "PHOTO_LIST_MODE" => "N",
                    "SECTION_PAGE_ELEMENTS" => "3",
                    "SECTION_SORT_BY" => "UF_DATE",
                    "SECTION_SORT_ORD" => "DESC",
                    "SEF_MODE" => "Y",
                    "SET_TITLE" => "N",
                    "SHOWN_ITEMS_COUNT" => "1",
                    "SHOW_LINK_ON_MAIN_PAGE" => array(
                        0 => "id",
                    ),
                    "SHOW_NAVIGATION" => "N",
                    "SHOW_TAGS" => "N",
                    "THUMBNAIL_SIZE" => "1024",
                    "UPLOAD_MAX_FILE_SIZE" => "8196",
                    "USE_COMMENTS" => "N",
                    "USE_LIGHT_VIEW" => "N",
                    "USE_RATING" => "N",
                    "USE_WATERMARK" => "N",
                    "WATERMARK_MIN_PICTURE_SIZE" => "800",
                    "WATERMARK_RULES" => "USER",
                    "SEF_FOLDER" => "/photogallery/",
                    "SEF_URL_TEMPLATES" => array(
                        "index" => "index.php",
                        "section" => "#SECTION_ID#/",
                        "section_edit" => "#SECTION_ID#/action/#ACTION#/",
                        "section_edit_icon" => "#SECTION_ID#/icon/action/#ACTION#/",
                        "upload" => "#SECTION_ID#/action/upload/",
                        "detail" => "#SECTION_ID#/#ELEMENT_ID#/",
                        "detail_edit" => "#SECTION_ID#/#ELEMENT_ID#/action/#ACTION#/",
                        "detail_list" => "list/",
                        "search" => "search/",
                    )
                ),
                false
            ); ?>
            <div class="text-right btn-video">
                <a href="<?= SITE_DIR ?>photogallery/">
                    <?= GetMessage("BTN_ALBUM_OTHER") ?>&nbsp;<i class="fa fa-angle-double-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h2 class="text-center"><?= GetMessage("MAINPAGE_HEADER_CONTACTS") ?></h2>
    </div>
</div>
<div class="bx-newslist-block">
    <div class="row">
        <div class="col-xs-12">
            <div class="contacts">
                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <h3><?=GetMessage("CONTACTS_ADDRESS")?></h3>
                        <p><?=$address?></p>
                    </div>
                    <div class="col-xs-12 col-lg-6">
                        <h3><?=GetMessage("CONTACTS_OPENING_HOURS")?></h3>
                        <p><?=$openingHours;?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <h3><?=GetMessage("CONTACTS_LOCATION")?></h3>
                        <?=$locationMap?>
                    </div>
                    <div class="col-xs-12 col-lg-6">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="map img-responsive">
                <?=$yandexMap?>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
