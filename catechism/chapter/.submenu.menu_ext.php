<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
if (CModule::IncludeModule("iblock")) {
    $SECTION_ID = $_REQUEST["CHAPTER_ID"]; // указываем инфоблок с элементами
    $arOrder = Array("SORT" => "ASC");
    $arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
    $arFilter = Array("SECTION_ID" => $SECTION_ID, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $aMenuLinksExt[] = Array(
            $arFields['NAME'],
            $arFields['DETAIL_PAGE_URL'],
            Array(),
            Array(),
            ""
        );
    }
}
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>