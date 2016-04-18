<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
$this->addExternalCss($this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css');
?>
<div class="row">
    <div class="col-xs-12 text-center">
        <h2><?= GetMessage("CT_HEADER"); ?></h2>
    </div>
</div>

<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?><br/>
<? endif; ?>
<? foreach ($arResult["ITEMS"] as $arItem):?>
<div class="row row-margin-bottom">
    <div class="col-xs-12">
        <div class="lib-panel">
            <div class="row bx-newslist-block">
                <div class="hidden-xs col-sm-4 col-lg-3">
                    <? if($arItem["PREVIEW_PICTURE"]["SRC"]): ?>
                        <img
                            class="lib-img-show"
                            src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                            title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                            />
                    <? else: ?>
                        <img
                            class="lib-img-show"
                            src="<?=SITE_TEMPLATE_PATH?>/img/feofan.jpg"
                            alt="<?= GetMessage("CT_IMG") ?>"
                            title="<?= GetMessage("CT_IMG") ?>"
                            />
                    <? endif; ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-lg-9">
                    <div class="lib-row lib-header">
                        <div class="row">
                            <div class="col-xs-6">
                                <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                                    <p class="ext"><i class="fa fa-calendar hidden-xs"></i>&nbsp;&nbsp;<? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></p>
                                <? endif ?>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="ext">
                                    <span class="hidden-xs">
                                        <?=$arItem["DISPLAY_PROPERTIES"]["number"]["NAME"]?>
                                    </span>
                                    <?=$arItem["DISPLAY_PROPERTIES"]["number"]["DISPLAY_VALUE"]?>
                                </p>
                            </div>
                        </div>
                        <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                            <h2><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["NAME"] ?></a></h2>
                        <? endif; ?>
                    </div>
                    <div class="lib-row lib-desc">
                        <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                            <p><?=$arItem["PREVIEW_TEXT"];?></p>
                        <? endif; ?>
                    </div>
                    <div class="row sunday-more">
                        <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                            <div class="col-xs-4 col-sm-6">
                                <div style="margin-top: 12px">
                                    <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
                                        <span class="hidden-xs"><? echo GetMessage("CT_BNL_GOTO_DETAIL") ?>&nbsp;</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        <? endif; ?>
                        <?
                        if ($arParams["USE_SHARE"] == "Y"):?>
                            <div class="col-xs-8 col-sm-6 text-right">
                                <noindex>
                                    <?
                                    $APPLICATION->IncludeComponent("bitrix:main.share", "main", array(
                                        "HANDLERS" => $arParams["SHARE_HANDLERS"],
                                        "PAGE_URL" => $arItem["~DETAIL_PAGE_URL"],
                                        "PAGE_TITLE" => $arItem["~NAME"],
                                        "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                                        "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                                        "HIDE" => $arParams["SHARE_HIDE"],
                                    ),
                                        $component,
                                        array("HIDE_ICONS" => "Y")
                                    );
                                    ?>
                                </noindex>
                            </div>
                        <?endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
