<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$name = null;
$img = null;
$content = null;
if(CModule::IncludeModule("iblock")) {
    $arSelect = Array("NAME", "DETAIL_PICTURE", "DETAIL_TEXT");
    $arFilter = Array( "ACTIVE" => "Y", "ID" => 20);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    if ($ar_res = $res->GetNext()) {
        $name = $ar_res['NAME'];
        $img = CFile::GetFileArray($ar_res["DETAIL_PICTURE"]);
        $content = $ar_res['DETAIL_TEXT'];
    }
}
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
    <div class="row hidden-xs">
        <div class="col-xs-12 col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3">
            <h1><?=$name?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-lg-3 submenu">
            <div class="posision-fixed">
                <div class="href text-center"><?=GetMessage("OUR_CHURCH")?></div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "submenu",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "COMPONENT_TEMPLATE" => ".default",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "submenu",
                        "USE_EXT" => "N"
                    )
                ); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-lg-9">
            <h1 class="visible-xs"><?=$name?></h1>
            <?if(!is_null($img)):?>
                <p><img class="img-responsive" src="<?=$img["SRC"]?>" alt="<?=$img["DESCRIPTION"]?>"></p>
            <?endif;?>
            <?=$content?>
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>