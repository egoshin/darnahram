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
        <? foreach ($arResult["SECTIONS"] as $res): ?>
            <div class="col-xs-12 col-md-4">
                <h6 class="text-center">
                    <a href="<?= $res["LINK"] ?>"><?= $res["NAME"] ?></a>
                </h6>
                <div class="photo-album-avatar" id="photo_album_cover_<?= $res["ID"] ?>" title="<?= htmlspecialcharsbx($res["~NAME"]) ?>"
                    <? if (!empty($res["DETAIL_PICTURE"]["SRC"])): ?>
                        style="background:url('<?= $res["DETAIL_PICTURE"]["SRC"] ?>') no-repeat; max-width: 100%; background-size: contain; margin: 0 auto;"
                    <? endif; ?>
                        onclick="window.location='<?= CUtil::JSEscape(htmlspecialcharsbx($res["~LINK"])) ?>';">
                    <div class="row visible-xs visible-sm" style="margin: 10px 0 0;">
                        <div class="col-xs-6" style="font-size: 16px; color: white;">
                            <?= $res["ELEMENTS_CNT"] ?> <?= GetMessage("P_SECT_PHOTOS") ?>
                        </div>
                        <div class="col-xs-6 text-right" style="font-size: 16px; color: white;">
                            <i class="fa fa-calculator"></i>&nbsp;<?= $res["DATE"] ?>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-sm">
                    <div class="col-xs-6" style="font-size: 16px; color: black;">
                        <?= $res["ELEMENTS_CNT"] ?> <?= GetMessage("P_SECT_PHOTOS") ?>
                    </div>
                    <div class="col-xs-6 text-right" style="font-size: 16px; color: black;">
                        <i class="fa fa-calculator"></i>&nbsp;<?= $res["DATE"] ?>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
</div>