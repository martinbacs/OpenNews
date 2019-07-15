<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/news/everything.php":
			$CURRENT_PAGE = "Everything"; 
			$PAGE_TITLE = "Search for articles";
			break;
		case "/news/source.php":
			$CURRENT_PAGE = "Source"; 
			$PAGE_TITLE = "News sources";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Top news";
	}
?>