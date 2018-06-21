<?php
function conect()
{
	
	if($_POST['pseudo'] == 'dav' or $_POST['pass'] == 'dav')
	{
		include(dirname(__FILE__).'/../modele/news.php');
		$co = conexion();
		$nex = conexio();
		include(dirname(__FILE__).'/../vue/conexion.php');
	}
	else
	{
		include(dirname(__FILE__).'/../vue/index.php');
	}
}

function conec()
{
	include(dirname(__FILE__).'/../vue/conexion.php');
}
?>
