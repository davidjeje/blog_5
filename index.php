<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');



if ((!empty($_GET['page'])) AND is_file('controleur/'.$_GET['page'].'.php') or isset($_GET['id']))
{
	
	if ($_GET['page'] == 'news') 
    {
    	include('controleur/'.$_GET['page'].'.php');
        afficher();
        affiche();
    } 

    elseif ($_GET['page'] == 'admin') 
    {
    	include ('controleur/'.$_GET['page'].'.php');
    	unblog();	
    }

  /*  elseif ( $_GET['id'] == $nn)
    {
    	include ('controleur/'.$_GET['id'].'.php');
    	$nn= $id;
    	unblog();
    	
    }*/

    elseif ($_GET['page'] == 'index') 
    {

        include('controleur/'.$_GET['page'].'.php');
        administrateur();
    }

    elseif ($_GET['page'] == 'conexion') 
    {

        include('controleur/'.$_GET['page'].'.php');
        conec();
    }

    elseif ($_GET['page'] == 'ajouter') 
    {

        include('controleur/'.$_GET['page'].'.php');
        ajouter();
        /*$author = $_POST['author'];//Test pour voir si je peux récupérer les données du formulaire par une méthode post. Apparament je n'arrive pas à récupérer les données. Voir si $_POST fonctionne.
    	$title = $_POST['title'];
    	$chapo = $_POST['chapo'];
    	$content = $_POST['content'];
    	//$image = $_POST['image'];
    	$change_date = $_POST['change_date'];*/

    }

    elseif ($_GET['page'] == 'ajout') 
    {

        include('controleur/'.$_GET['page'].'.php');
        ajout();
        
    }

    elseif ($_GET['page'] == 'modifier') 
    {

        include('controleur/'.$_GET['page'].'.php');
        modifier();
    }

    elseif ($_GET['page'] == 'modif') 
    {

        include('controleur/'.$_GET['page'].'.php');
        //modifier();
    }

    elseif ($_GET['page'] == 'supprimer') 
    {

        include('controleur/'.$_GET['page'].'.php');
        supprimer();
    }

    elseif ($_GET['page'] == 'sup') 
    {

        include('controleur/'.$_GET['page'].'.php');
        sup();
    }

    elseif ($_GET['page'] == 'commentaire') 
    {

        include('controleur/'.$_GET['page'].'.php');
    }

    elseif ($_GET['page'] == 'coment') 
    {

        include('controleur/'.$_GET['page'].'.php');
    }

    elseif ($_GET['page'] == 'valider') 
    {

        include('controleur/'.$_GET['page'].'.php');
        add();
    }

    elseif ($_GET['page'] == 'inscrip') 
    {
        include('controleur/'.$_GET['page'].'.php');
        inscription();
    }
}


   
else
{
	include('controleur/index.php');
	accueil();
}
?>
