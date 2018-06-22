<?php
function modifier()
{
	include(dirname(__FILE__).'/../modele/news.php');
	if (!empty($_POST['idd']) and !empty($_POST['user']) and !empty($_POST['author']) and !empty($_POST['title']) and !empty($_POST['chapo']) and !empty($_POST['content'])  and !empty($_POST['change_date']))
	{
		$id = $_POST['idd'];
		$user_id = $_POST['user'];
		$author = $_POST['author'];
    	$title = $_POST['title'];
    	$chapo = $_POST['chapo'];
    	$content = $_POST['content'];
    	//$image = $_POST['image'];
    	$change_date = $_POST['change_date'];

    	modifie($id, $user_id, $author, $title, $chapo, $content, $change_date);
    	include(dirname(__FILE__).'/../vue/modifier.php');

	}
	else
	{
		include(dirname(__FILE__).'/../vue/conexion.php');
	}
?>
