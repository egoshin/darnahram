<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "1",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "catechism",
		"ID" => $_REQUEST["ID"],
		"IS_SEF" => "Y",
        "SEF_BASE_URL" => "#SITE_DIR#/catechism/",
        "SECTION_PAGE_URL" => "chapter/#SECTION_ID#/",
        "DETAIL_PAGE_URL" => "chapter/#SECTION_ID#/#ELEMENT_ID#/"
	),
	false
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>