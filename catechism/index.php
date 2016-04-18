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
            <h1><?=$title?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <section id="pinBoot">
                <?
                if (CModule::IncludeModule("iblock")):
                    $arSelect = Array("ID", "NAME", "PICTURE", "SECTION_PAGE_URL");
                    $arFilter = Array("ACTIVE" => "Y", "IBLOCK_ID" => 6);
                    $arOrder = Array("SORT" => "ASC");
                    $arSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect, false);
                    while ($arSect_res = $arSect->GetNext()):
                ?>
                        <article class="white-panel">
                            <a href="<?=$arSect_res['SECTION_PAGE_URL'];?>">
                                <?$imgSect = CFile::GetFileArray($arSect_res["PICTURE"]);?>
                                <img src="<?= $imgSect["SRC"] ?>" alt="<?= $imgSect["DESCRIPTION"] ?>">
                                <h3><?=$arSect_res['NAME'];?></h3>
                            </a>
                            <p class="hidden-xs">
                                <?
                                $SECTION_ID = $arSect_res['ID'];
                                $arOrder = Array("SORT" => "ASC");
                                $arSelect = Array("NAME", "DETAIL_PAGE_URL");
                                $arFilter = Array("SECTION_ID" => $SECTION_ID, "ACTIVE" => "Y");
                                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                                while ($arFields = $res->GetNext()):
                                ?>
                                    <a href="<?= $arFields['DETAIL_PAGE_URL']; ?>"><?= $arFields['NAME']; ?></a><br>
                                <?endwhile;?>
                            </p>
                        </article>
                <?
                    endwhile;
                endif;
                ?>
            </section>
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>