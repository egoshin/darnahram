<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->addExternalCss($this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css');
CUtil::InitJSCore(array('fx'));
?>
<div id="<?echo $this->GetEditAreaId($arResult['ID'])?>">
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<div class="row bx-detail-top">
			<div class="col-xs-5 text-left">
				<div class="bx-newsdetail-date">
					<span class="hidden-xs"><i class="fa fa-calendar"></i>&nbsp;&nbsp;</span><?echo $arResult["DISPLAY_ACTIVE_FROM"]?>
				</div>
			</div>
            <div class="col-xs-7 text-right">
            <?if ($arParams["USE_SHARE"] == "Y"):?>
                <div class="social-detail">
                    <noindex>
                        <?
                        $APPLICATION->IncludeComponent("bitrix:main.share", $arParams["SHARE_TEMPLATE"], array(
                            "HANDLERS" => $arParams["SHARE_HANDLERS"],
                            "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                            "PAGE_TITLE" => $arResult["~NAME"],
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
        <hr style="margin-bottom: 5px;">
		<div class="sunday-number text-right"><?=$arResult["DISPLAY_PROPERTIES"]["number"]["NAME"]?><?=$arResult["DISPLAY_PROPERTIES"]["number"]["DISPLAY_VALUE"]?></div>
	<?endif?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1><?=$arResult["NAME"]?></h1>
	<?endif;?>
	<div class="bx-newsdetail-content">
	<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
		<?if (is_array($arResult["DETAIL_PICTURE"])):?>
			<div class="bx-newsdetail-img bx-newsdetail-img-obt">
				<img
					class="img-responsive"
					src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
					alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
					title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
					/>
			</div>
		<?endif;?>
	<?endif?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	</div>
	<?if($arResult["DISPLAY_PROPERTIES"]["THOUGHTS"]["~VALUE"]["TEXT"]):?>
		<div class="row">
			<div class="col-sm-offset-4 col-sm-8 col-lg-offset-3 col-lg-9">
				<h2 class="text-center">
					Святитель Феофан Затворник.<br>
					Мысли на каждый день года.
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="hidden-xs col-sm-4 col-lg-3">
				<img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/img/feofan.jpg" alt="<?= GetMessage("CT_IMG") ?>" title="<?= GetMessage("CT_IMG") ?>"/>
			</div>
			<div class="col-xs-12 col-sm-8 col-lg-9">
				<?=$arResult["DISPLAY_PROPERTIES"]["THOUGHTS"]["~VALUE"]["TEXT"]?>
			</div>
		</div>
	<?endif;?>
</div>
<script type="text/javascript">
	BX.ready(function() {
		var slider = new JCNewsSlider('<?=CUtil::JSEscape($this->GetEditAreaId($arResult['ID']));?>', {
			imagesContainerClassName: 'bx-newsdetail-slider-container',
			leftArrowClassName: 'bx-newsdetail-slider-arrow-container-left',
			rightArrowClassName: 'bx-newsdetail-slider-arrow-container-right',
			controlContainerClassName: 'bx-newsdetail-slider-control'
		});
	});
</script>
