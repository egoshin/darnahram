<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/********************************************************************
 * Input params
 ********************************************************************/
$arParams["ALBUM_PHOTO_SIZE"] = intVal($arParams["ALBUM_PHOTO_SIZE"]);

/********************************************************************
 * /Input params
 ********************************************************************/

// TODO: get rid of this
CAjax::Init();
// TODO: get rid of this too
$GLOBALS['APPLICATION']->AddHeadScript('/bitrix/js/main/utils.js');
$GLOBALS['APPLICATION']->AddHeadScript('/bitrix/components/bitrix/photogallery/templates/.default/script.js');
?>
<div class="row">
    <div class="col-xs-12">
        <h1><?= GetMessage("P_ALBUM_HEADER");?></h1>
    </div>
</div>
<div class="row">
    <section id="pinBoot">
        <? foreach ($arResult["SECTIONS"] as $res): ?>
                <article class="white-panel">
                    <div class="text-right" style="font-size: 16px; color: black;">
                        <i class="fa fa-calculator"></i>&nbsp;<?= $res["DATE"] ?>
                    </div>
                    <div class="photo-album-avatar" id="photo_album_cover_<?= $res["ID"] ?>" title="<?= htmlspecialcharsbx($res["~NAME"]) ?>"
                        <? if (!empty($res["DETAIL_PICTURE"]["SRC"])): ?>
                            style="background:url('<?= $res["DETAIL_PICTURE"]["SRC"] ?>') no-repeat; max-width: 100%; background-size: contain"
                        <? endif; ?>
                            onclick="window.location='<?= CUtil::JSEscape(htmlspecialcharsbx($res["~LINK"])) ?>';">
                    </div>
                    <div style="font-size: 16px; color: black;">
                        <?= $res["ELEMENTS_CNT"] ?> <?= GetMessage("P_SECT_PHOTOS") ?>
                    </div>
                    <h3>
                        <a href="<?= $res["LINK"] ?>"><?= $res["NAME"] ?></a>
                    </h3>
                    <div>
                        <?= $res["DESCRIPTION"] ?>
                    </div>
            </article>
        <? endforeach; ?>
    </section>
</div>
<?
if (!empty($arResult["NAV_STRING"])):
    ?>
    <div class="photo-navigation photo-navigation-bottom">
        <?= $arResult["NAV_STRING"] ?>
    </div>
    <?
endif;
?>