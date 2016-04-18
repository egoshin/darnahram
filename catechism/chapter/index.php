<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$name = null;
$content = null;
$ext = null;
$section = null;
$section = null;
$molitvaCS = null;
$molitvaRus = null;
if(CModule::IncludeModule("iblock")) {
    $arSelect = Array("NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_PrayerChurchSlavonic", "PROPERTY_PrayerRussian");
    $arOrder = Array("SORT" => "ASC");
    if (!is_null($_REQUEST["ID"]))
        $arFilter = Array( "ACTIVE" => "Y", "ID" => $_REQUEST["ID"]);
    else
        $arFilter = Array( "ACTIVE" => "Y", "SECTION_ID" => $_REQUEST["CHAPTER_ID"]);
    $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
    if ($ar_res = $res->GetNext()) {
        $name = $ar_res['NAME'];
        $content = $ar_res['DETAIL_TEXT'];
        $ext = $ar_res['PREVIEW_TEXT'];
        $molitvaCS = $ar_res['~PROPERTY_PRAYERCHURCHSLAVONIC_VALUE']["TEXT"];
        $molitvaRus = $ar_res['~PROPERTY_PRAYERRUSSIAN_VALUE']["TEXT"];
    }
}
$APPLICATION->AddChainItem($name,"");
$res = CIBlockSection::GetByID($_REQUEST["CHAPTER_ID"]);
if($ar_res = $res->GetNext())
    $section = $ar_res['NAME'];
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
        <div class="col-xs-12 col-sm-4 col-lg-3 submenu" id="abcMenu">
            <div class="posision-fixed">
                <div class="href text-center"><?=$section?></div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "abc",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "submenu",
                        "COMPONENT_TEMPLATE" => ".default",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "submenu",
                        "USE_EXT" => "Y"
                    )
                ); ?>
                <ul>
                    <hr class="hr-submenu">
                    <li>
                        <a href="<?= SITE_DIR ?>catechism/">
                            <?=GetMessage("CATECHISM")?>&nbsp;&nbsp;
                            <i class="fa fa-angle-double-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-lg-9">
            <h1 class="visible-xs"><?=$name?></h1>
            <?if(!is_null($ext)):?>
                <div class="text-block">
                    <?=$ext?>
                </div>
            <?endif;?>
            <?if(!is_null($molitvaCS)):?>
                <div class="row molitva2">
                    <div class="col-xs-12 col-sm-6 ff-izhitsa"><?=$molitvaCS?></div>
                    <div class="col-xs-12 col-sm-6"><?=$molitvaRus?></div>
                </div>
            <?endif;?>
            <div class="text-block">
                <?=$content?>
            </div>
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>