<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<div class="row">
    <div class="col-xs-12">
        <?
            $currDate = date('my');
            $year = date('y');
            if((int)date('m') < 9) {
                $nextDate = '0'.((int)date('m')+1);
            } else if((int)date('m') < 12) {
                $nextDate = (int)date('m')+1;
            } else {
                $nextDate = '01';
                $year++;
            }
            $nextDate = date('m')."-".$nextDate.$year;
            $href = null;
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/schedule/".$nextDate.".pdf"))
                $href = SITE_DIR."schedule/".$nextDate.".pdf";
            else
                $href = SITE_DIR."schedule/".$currDate.".pdf";
        ?>
        <h1>
            <?=$title;?>
            <br class="visible-xs">
            <?if(!is_null($href)):?>
            <a
                class="small download-pdf"
                href="<?=$href?>"
                target="_blank">
                <?=GetMessage("BTN_SCHEDULE_PDF")?>
            </a>
            <?endif;?>
        </h1>
        <?
        if(CModule::IncludeModule("iblock")):
            $arSelect = Array("PROPERTY_date");
            $arFilter = Array("IBLOCK_ID"=>2, "ACTIVE"=>"Y", ">=PROPERTY_date"=>date('Y-m-d'));
            $arOrder = Array("PROPERTY_date"=>"DESC");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
            $maxDate = null;
            $curDate = null;
            $interval = null;
            if($arFields = $res->GetNext()){
                $maxDate = strtotime($DB->DateFormatToPHP($arFields["PROPERTY_DATE_VALUE"]));
                $maxDate = mktime(0,0,0,date(m, $maxDate),date(d, $maxDate),date(Y, $maxDate));
                $curDate = strtotime(date('d.m.Y'));
                $curDate = mktime(0,0,0,date(m, $curDate),date(d, $curDate),date(Y, $curDate));
                $interval = ($maxDate - $curDate)/86400;
            }
            $from = date('Y-m-d', $curDate);
            $endDate = date('Y-m-d', strtotime($from.'+'.$interval.' day'));
            $wd = 7 - date('w');
            if(date('w') == 0)
                $to = $from;
            else
                $to = date('Y-m-d', strtotime($from.'+'.$wd.' day'));
            $countweek = 1;
            $arWeekBegin[$countweek] = $from;
            $arWeekEnd[$countweek] = $to;
            $countweek++;
            $bDate = date('Y-m-d', strtotime($to.'+1 day'));
            while ($bDate <= $endDate) {
                $arWeekBegin[$countweek] = $bDate;
                $arWeekEnd[$countweek] = date('Y-m-d', strtotime($bDate.'+6 day'));;
                $bDate = date('Y-m-d', strtotime($bDate.'+7 day'));
                $countweek++;
            }
            $countweek--;
            $param = substr($_REQUEST["week"],0,-1);
            if($param){
                $from = $arWeekBegin[trim($param)];
                $to = $arWeekEnd[trim($param)];
            }
            else{
                $from = date('Y-m-d', $curDate);
                $endDate = date('Y-m-d', strtotime($from.'+'.$interval.' day'));
                $wd = 7 - date('w');
                if(date('w') == 0)
                    $to = $from;
                else
                    $to = date('Y-m-d', strtotime($from.'+'.$wd.' day'));
            }
            $arSelect = Array("NAME", "PREVIEW_PICTURE", "PROPERTY_date","PROPERTY_holiday", "PROPERTY_service_time_1",
                "PROPERTY_service_add_1", "PROPERTY_service2", "PROPERTY_service_time_2", "PROPERTY_service_add_2",
                "PROPERTY_service3", "PROPERTY_service_time_3", "PROPERTY_service_add_3", "PROPERTY_holiday_description",
                "PROPERTY_bottom");
            $arFilter = Array("IBLOCK_ID"=>2, "ACTIVE"=>"Y", "><PROPERTY_date"=>array($from, $to));
            $arOrder = Array("PROPERTY_date"=>"ASC");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);?>
            <div class="row bold top-nav-rasp">
                <div class="col-xs-6 text-left">
                    <?if((trim($param) != 1) && $param):?>
                        <a class="btn btn-default" href="<?=SITE_DIR?>schedule/<?=trim($param)-1?>/" role="button">
                            <i class="fa fa-long-arrow-left"></i><span class="hidden-xs">&nbsp;&nbsp;<?=GetMessage("BTN_PREV")?></span>
                        </a>
                    <?endif;?>
                </div>
                <div class="col-xs-6 text-right">
                    <?if(trim($param) < $countweek):
                        if($param):?>
                            <a class="btn btn-default" href="<?=SITE_DIR?>schedule/<?=trim($param)+1?>/" role="button">
                                <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                            </a>
                        <?else:
                            if ($countweek != 1):?>
                                <a class="btn btn-default" href="<?=SITE_DIR?>schedule/2/" role="button">
                                    <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                                </a>
                            <?endif;
                        endif;
                    endif;?>
                </div>
            </div>
            <?while($arFields = $res->GetNext()):
            $icon = CFile::GetFileArray($arFields["PREVIEW_PICTURE"]);
            $date = $arFields["PROPERTY_DATE_VALUE"];
            setlocale(LC_ALL, 'ru_RU.UTF-8');
            $week = strftime("%A",strtotime($date));
            if($arFields["PROPERTY_HOLIDAY_VALUE"] == "Да") {
                $fontColor = "#a94442";
            }
            else {
                $fontColor = "#31708f";
            }
            if($week == "Воскресенье") {
                $panelColor = "panel-danger";
                $fontColor = "#a94442";
            }
            else {
                $panelColor = "panel-default";
            }
            ?>
            <div class="panel <?=$panelColor?>">
                <div class="panel-heading">
                    <h3 class="panel-title bold ff-izhitsa" style="color: <?=$fontColor?>;"><?=$date?>. <?=$week?>.<br><?=$arFields["~PROPERTY_HOLIDAY_DESCRIPTION_VALUE"]["TEXT"]?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2 hidden-xs hidden-sm">
                            <img class="img-responsive" src="<?=$icon["SRC"]?>" alt="<?=$icon["DESCRIPTION"]?>">
                        </div>
                        <div class="col-xs-12 col-md-10">
                            <?if($arFields["NAME"]):?>
                                <? if($arFields["~PROPERTY_SERVICE_ADD_1_VALUE"]["TEXT"]): ?>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_1_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-9 col-sm-4">
                                            <p class="bold ff-izhitsa"><?=$arFields["NAME"]?></p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p class="ff-izhitsa"><?=$arFields["~PROPERTY_SERVICE_ADD_1_VALUE"]["TEXT"]?></p>
                                        </div>
                                    </div>
                                <?else:?>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_1_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-9 col-sm-10">
                                            <p class="bold ff-izhitsa"><?=$arFields["NAME"]?></p>
                                        </div>
                                    </div>
                                <?endif;?>
                            <?endif;?>
                            <?if($arFields["PROPERTY_SERVICE2_VALUE"]):?>
                                <? if($arFields["~PROPERTY_SERVICE_ADD_2_VALUE"]["TEXT"]): ?>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_2_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-9 col-sm-4">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE2_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p class="ff-izhitsa"><?=$arFields["~PROPERTY_SERVICE_ADD_2_VALUE"]["TEXT"]?></p>
                                        </div>
                                    </div>
                                <?else:?>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_2_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-9 col-sm-10">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE2_VALUE"]?></p>
                                        </div>
                                    </div>
                                <?endif;?>
                            <?endif;?>
                            <?if($arFields["PROPERTY_SERVICE3_VALUE"]):?>
                                <?if($arFields["PROPERTY_SERVICE3_VALUE"]):?>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_3_VALUE"]?></p>
                                        </div>
                                        <div class="ccol-xs-9 col-sm-4">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE3_VALUE"]?></p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p class="ff-izhitsa"><?=$arFields["~PROPERTY_SERVICE_ADD_3_VALUE"]["TEXT"]?></p>
                                        </div>
                                    </div>
                                <?else:?>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-2">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE_TIME_3_VALUE"]?></p>
                                        </div>
                                        <div class="ccol-xs-9 col-sm-10">
                                            <p class="bold ff-izhitsa"><?=$arFields["PROPERTY_SERVICE3_VALUE"]?></p>
                                        </div>
                                    </div>
                                <?endif;?>
                            <?endif;?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-danger ff-izhitsa" style="color: <?=$fontColor?>;"><?=$arFields["~PROPERTY_BOTTOM_VALUE"]["TEXT"]?></div>
            </div>
            <?
        endwhile;
        endif;
        ?>
        <div class="row bold bottom-nav-rasp">
            <div class="col-xs-6 text-left">
                <?if((trim($param) != 1) && $param):?>
                    <a class="btn btn-default" href="<?=SITE_DIR?>schedule/<?=trim($param)-1?>/" role="button">
                        <i class="fa fa-long-arrow-left"></i><span class="hidden-xs">&nbsp;&nbsp;<?=GetMessage("BTN_PREV")?></span>
                    </a>
                <?endif;?>
            </div>
            <div class="col-xs-6 text-right">
                <?if(trim($param) < $countweek):
                    if($param):?>
                        <a class="btn btn-default" href="<?=SITE_DIR?>schedule/<?=trim($param)+1?>/" role="button">
                            <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                        </a>
                    <?else:
                        if ($countweek != 1):?>
                            <a class="btn btn-default" href="<?=SITE_DIR?>schedule/2/" role="button">
                                <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                            </a>
                        <?endif;
                    endif;
                endif;?>
            </div>
        </div>
    </div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>