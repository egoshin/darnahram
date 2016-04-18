<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
IncludeTemplateLangFile(__FILE__);
$phone = null;
$email = null;
$facebook = null;
$youtube = null;
$twitter = null;
$address = null;
$yandexMap = null;
$locationMap = null;
$openingHours = null;
if(CModule::IncludeModule("iblock")) {
	$arSelect = Array("PROPERTY_address", "PROPERTY_opening_hours", "PROPERTY_phone", "PROPERTY_email", "PROPERTY_facebook", "PROPERTY_youtube",
		"PROPERTY_twitter", "PROPERTY_yandex_map", "PROPERTY_location_map");
	$arFilter = Array("IBLOCK_ID" => 1, "ACTIVE" => "Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	if ($ar_res = $res->GetNext()) {
		$phone = $ar_res['PROPERTY_PHONE_VALUE'];
		$email = $ar_res['PROPERTY_EMAIL_VALUE'];
		$facebook = $ar_res['PROPERTY_FACEBOOK_VALUE'];
		$youtube = $ar_res['PROPERTY_YOUTUBE_VALUE'];
		$twitter = $ar_res['PROPERTY_TWITTER_VALUE'];
		$address = $ar_res['PROPERTY_ADDRESS_VALUE'];
		$openingHours = $ar_res['PROPERTY_OPENING_HOURS_VALUE'];
		$yandexMap = $ar_res['~PROPERTY_YANDEX_MAP_VALUE'];
		$locationMap = $ar_res['~PROPERTY_LOCATION_MAP_VALUE']['TEXT'];
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?
	if($section_php = $APPLICATION->GetFileRecursive(".section.php")) {
		@include($_SERVER['DOCUMENT_ROOT'].$section_php);
		$title = $sSectionName;
	}
	$APPLICATION->SetTitle($title);
	?>
	<title><?$APPLICATION->ShowTitle($title);?></title>
	<?$APPLICATION->ShowHead();?>
	<link rel="apple-touch-icon" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?=SITE_TEMPLATE_PATH?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?=SITE_TEMPLATE_PATH?>/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?=SITE_TEMPLATE_PATH?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<?$APPLICATION->ShowHeadScripts()?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jasny-bootstrap.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/scrolltop.min.js');?>
	<?/*$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/media.match.min.js');*/?><!--
	--><?/*$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/enquire.min.js');*/?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');?>
	<!--[if lt IE 9]>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/ie9/html5shiv.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/ie9/html5shiv-printshiv.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/ie9/respond.js"></script>
	<![endif]-->
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/style.min.css');?>
</head>
<body>
    <div class="main">
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<header role="banner">
			<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" data-disable-scrolling="false">
				<a class="navmenu-brand visible-md visible-lg text-center" href="<?=SITE_DIR?>">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/logotype.png" alt="<?=GetMessage("HEADER_LOGOTYPE_ALT")?>"><br>
                    <?=GetMessage("HEADER_LOGOTYPE_FULL")?>
				</a>
				<hr>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "main",
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
                        "ROOT_MENU_TYPE" => "left",
                        "USE_EXT" => "N"
                    )
                );?>
				<hr>
				<div class="menu-item-sheduler text-center">
					<a class="btn btn-danger" href="<?=SITE_DIR?>schedule/" role="button"><?=GetMessage("BTN_SCHEDULE_SERVICE")?></a>
				</div>
				<div class="contactR-block visible-md visible-lg">
					<div class="phone-mail">
						<a href="tel:+<?=preg_replace("#[^\d]#", "", $phone)?>"><?=$phone?></a><br>
						<a href="mailto:<?=$email?>"><?=$email?></a>
					</div>
					<ul class="list-inline social">
						<li><a href="<?=$facebook?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
						<li><a href="<?=$twitter?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
						<li><a href="<?=$youtube?>" target="_blank"><i class="fa fa-youtube fa-lg"></i></a></li>
					</ul>
				</div>
				<div id="baza23Top" class="hidden-xs hidden-sm">
					<hr>
					<div class="baza23 text-center">
						<a href='<?=GetMessage("FOOTER_CREATOR_URL")?>' target='_blank'><?=GetMessage("FOOTER_CREATOR_TEXT")?>&nbsp;<?=GetMessage("FOOTER_CREATOR_HREF")?></a>
					</div>
				</div>
			</div>
			<div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
				<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
                    <span class="sr-only"><?=GetMessage("HEADER_SR_ONLY")?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?=SITE_DIR?>">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/logotype.png" alt="<?=GetMessage("HEADER_LOGOTYPE_ALT")?>">
                    <?=GetMessage("HEADER_LOGOTYPE")?>
                </a>
			</div>
			<div class="navbar-fixed-bottom visible-md visible-lg">
				<div id="baza23Bottom">
					<hr>
					<div class="baza23 text-center">
						<a href='tel:+74951502201' target='_blank'><?=GetMessage("FOOTER_CREATOR_TEXT")?>&nbsp;<?=GetMessage("FOOTER_CREATOR_HREF")?></a>
					</div>
				</div>
			</div>
		</header>
		<div class="context">
			<div class="container-fluid">