<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
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
    <div class="row">
        <div class="col-xs-12">
            <? $APPLICATION->IncludeComponent(
                "bitrix:photogallery",
                "main",
                array(
                    "ADDITIONAL_SIGHTS" => array(),
                    "ALBUM_PHOTO_SIZE" => "1024",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "COMPONENT_TEMPLATE" => "main",
                    "DATE_TIME_FORMAT_DETAIL" => "d.m.Y",
                    "DATE_TIME_FORMAT_SECTION" => "d.m.Y",
                    "DRAG_SORT" => "Y",
                    "ELEMENTS_PAGE_ELEMENTS" => "3000",
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
                    "SECTION_PAGE_ELEMENTS" => "9",
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
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>