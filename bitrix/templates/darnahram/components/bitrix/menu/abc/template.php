<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>
<?$count = 1;
foreach($arResult as $arItem):
	if(!isset($_REQUEST["ID"]) and $count == 1):?>
		<li class="active">
			<a href="<?=$arItem["LINK"]?>" class="hidden-xs selected"><?=$arItem["TEXT"]?></a>
			<a href="<?=$arItem["LINK"]?>#article" class="visible-xs selected"><?=$arItem["TEXT"]?></a>
		</li>
	<?else:
		if($arItem["SELECTED"]):?>
			<li class="active">
				<a href="<?=$arItem["LINK"]?>" class="hidden-xs selected"><?=$arItem["TEXT"]?></a>
				<a href="<?=$arItem["LINK"]?>#article" class="visible-xs selected"><?=$arItem["TEXT"]?></a>
			</li>
		<?else:?>
			<li>
				<a href="<?=$arItem["LINK"]?>" class="hidden-xs"><?=$arItem["TEXT"]?></a>
				<a href="<?=$arItem["LINK"]?>#article" class="visible-xs"><?=$arItem["TEXT"]?></a>
			</li>
		<?endif;
	endif;
	$count++;
endforeach?>
</ul>
<a href="#" id="article"></a>
<?endif?>