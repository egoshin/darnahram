<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>
<?foreach($arResult as $arItem):
		if($arItem["SELECTED"]):?>
			<li class="active hidden-xs"><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
			<li class="active visible-xs"><a href="<?=$arItem["LINK"]?>#article" class="selected"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li class="hidden-xs"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<li class="visible-xs"><a href="<?=$arItem["LINK"]?>#article"><?=$arItem["TEXT"]?></a></li>
		<?endif;
endforeach;?>
</ul>
<a href="#" id="article"></a>
<?endif?>