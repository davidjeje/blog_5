<?php
function afficher()
{
	include(dirname(__FILE__).'/../modele/news.php');
	$news = afficher_news();
	include(dirname(__FILE__).'/../vue/news.php');
}


?>
