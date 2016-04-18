<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 *
 * 	<ol class="breadcrumb">
 * 		<li><a href="#">Home</a></li>
 * 		<li><a href="#">Library</a></li>
 * 		<li class="active">Data</li>
 * 	</ol>
 */

global $APPLICATION;

if(empty($arResult))
	return "";
$strReturn = '';
$strReturn .= '<ol class="breadcrumb">';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
	}
	else {
		$strReturn .= '<li class="active">'.$title.'</li>';
	}
}
$strReturn .= '</ol>';
return $strReturn;