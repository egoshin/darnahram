<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Воскресные листки");
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "default", Array(
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                "SITE_ID" => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
            ),
                false
            ); ?>
        </div>
    </div>
<? $APPLICATION->IncludeComponent(
    "bitrix:news",
    "sunday",
    array(
        "ADD_ELEMENT_CHAIN" => "Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "sunday",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "DETAIL_PAGER_SHOW_ALL" => "Y",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PROPERTY_CODE" => array(
            0 => "THOUGHTS",
            1 => "number",
            2 => "",
        ),
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "contentDarnahram",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => array(
            0 => "",
            1 => "",
            2 => "",
            3 => "",
        ),
        "LIST_PROPERTY_CODE" => array(
            0 => "THOUGHTS",
            1 => "number",
            2 => "",
        ),
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "NEWS_COUNT" => "5",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PAGER_TITLE" => "События",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SEF_FOLDER" => "/sunday-sheets/",
        "SEF_MODE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "PROPERTY_UP_IS_ANNOUNCEMENT",
        "SORT_BY2" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "DESC",
        "USE_CATEGORIES" => "N",
        "USE_FILTER" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_RATING" => "N",
        "USE_REVIEW" => "N",
        "USE_RSS" => "N",
        "USE_SEARCH" => "N",
        "USE_SHARE" => "Y",
        "TAGS_CLOUD_ELEMENTS" => "150",
        "PERIOD_NEW_TAGS" => "",
        "DISPLAY_AS_RATING" => "rating",
        "FONT_MAX" => "50",
        "FONT_MIN" => "10",
        "COLOR_NEW" => "3E74E6",
        "COLOR_OLD" => "C0C0C0",
        "TAGS_CLOUD_WIDTH" => "100%",
        "TEMPLATE_THEME" => "blue",
        "MEDIA_PROPERTY" => "",
        "SLIDER_PROPERTY" => "",
        "CATEGORY_IBLOCK" => array(
            0 => "1",
            1 => "2",
            2 => "3",
        ),
        "CATEGORY_CODE" => "CATEGORY",
        "CATEGORY_ITEMS_COUNT" => "5",
        "CATEGORY_THEME_1" => "list",
        "CATEGORY_THEME_2" => "list",
        "CATEGORY_THEME_3" => "list",
        "LIST_USE_SHARE" => "Y",
        "SHARE_TEMPLATE" => "main",
        "SHARE_HANDLERS" => array(
            0 => "vk",
            1 => "facebook",
            2 => "twitter",
        ),
        "SHARE_SHORTEN_URL_LOGIN" => "",
        "SHARE_SHORTEN_URL_KEY" => "",
        "SEF_URL_TEMPLATES" => array(
            "news" => "",
            "section" => "/sunday-sheets/",
            "detail" => "#ELEMENT_ID#/",
        )
    ),
    false
);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>