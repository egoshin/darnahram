<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catechism/chapter/([0-9]+)/([0-9]+)/#",
		"RULE" => "CHAPTER_ID=\$1&ID=\$2",
		"ID" => "",
		"PATH" => "/catechism/chapter/index.php",
	),
	array(
		"CONDITION" => "#^/catechism/chapter/([0-9]+)/#",
		"RULE" => "CHAPTER_ID=\$1",
		"ID" => "",
		"PATH" => "/catechism/chapter/index.php",
	),
	array(
		"CONDITION" => "#^/sunday-sheets/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/sunday-sheets/index.php",
	),
	array(
		"CONDITION" => "#^/photogallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery",
		"PATH" => "/photogallery/index.php",
	),
	array(
		"CONDITION" => "#^/photogallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery",
		"PATH" => "/index.php",
	),
	array(
		"CONDITION" => "#^/events/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/events/index.php",
	),
	array(
		"CONDITION" => "#^/schedule/#",
		"RULE" => "week=\$1",
		"ID" => "",
		"PATH" => "/schedule/index.php",
	),
);

?>