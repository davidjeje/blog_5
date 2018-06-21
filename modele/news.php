<?php
function afficher_news()
{
	global $bdd;
	$news= array();
	$req= $bdd ->query('SELECT id, author, title, chapo, image FROM blog_post');
	while ($data = $req->fetchall()) 
	{
		
		$news = $data;
		return $news;
	}
};

function afficher_date()
{
	global $bdd;
	$date= array();
	$req= $bdd ->query('SELECT id, blog_post_id, array FROM date_display');
	while ($data = $req->fetchall()) 
	{
		
		$date = $data;
		return $date;
	}
};

	function geta($id)
{
    global $bdd;
    $data= array();
    $req = $bdd->prepare('SELECT id, title, chapo, content, image,DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM blog_post WHERE id = ?');
    $req->execute(array($_GET['id']));
    /*if($req->rowcount() == 1)
    {*/
    	$data = $req->fetch();
    	return $data;
    //}
    /*else
    {
    	header('location: index.php');
    }*/    
}

function ajoute($user, $author, $title, $chapo, $content, $change_date)
{
    global $bdd;
    
    
	try
	{
		$req = $bdd->prepare('INSERT INTO blog_post (user, author, title, chapo, content, change_date) VALUES (?, ?, ?, ?, ?)');
    	$req->execute(array($_POST['user'], $_POST['author'], $_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['change_date']));
    	//header('Location: vue/ajouter.php');
	}
catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}    
};

function a($id, $user_id, $author, $title, $chapo, $content, $change_date)
{
    global $bdd;
    
try
{
	$req = $bdd->prepare('INSERT INTO blog_post VALUES (:id, :user_id, :author, :title, :chapo, :content, :change_date)');
	$req->bindValue(':id', $_POST['idd'], PDO::PARAM_STR);
	$req->bindValue(':user_id', $_POST['user'], PDO::PARAM_STR);
	$req->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
	$req->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
	$req->bindValue(':chapo', $_POST['chapo'], PDO::PARAM_STR);
	$req->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
	$req->bindValue(':change_date', $_POST['change_date'], PDO::PARAM_STR);


    $req->execute();
    //header('Location: vue/ajouter.php');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
}

function aj()
{
    global $bdd;
    
try
{
	$req = $bdd->prepare('INSERT INTO blog_post VALUES (NULL, :user, :author, :title, :chapo, :content, :change_date)');

	$req->bindValue(':user', $_POST['user'], PDO::PARAM_STR);
	$req->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
	$req->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
	$req->bindValue(':chapo', $_POST['chapo'], PDO::PARAM_STR);
	$req->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
	$req->bindValue(':change_date', $_POST['change_date'], PDO::PARAM_STR);


    $req->execute();
    //header('Location: vue/ajouter.php');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
    
    
};

function modifie($id, $user_id, $author, $title, $chapo, $content, $change_date)
{
    global $bdd;
    
try
{
	$req = $bdd->prepare('UPDATE blog_post SET id = :id, user_id = :user, author = :author, title = :title, chapo = :chapo, content = :content, change_date = :change_date)');

    $req->execute(array(':id' => $_POST['idd'],':user' => $_POST['user'], ':author' => $_POST['author'], ':title' => $_POST['title'], ':chapo' => $_POST['chapo'], ':content' => $_POST['content'], ':change_date' => $_POST['change_date']));
    //header('Location: vue/ajouter.php');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
    
       
};

function supprimer($id, $user_id, $author, $title, $chapo, $content, $change_date)
{
    global $bdd;
    
try
{
	$req = $bdd->prepare('DELETE FROM blog_post WHERE id= :id and user_id= :user and author= :author and titlie= :title and chapo= :chapo and content= :content and change_date = :change_date');
	$req->bindParam(':id', $_POST['idd'], PDO::PARAM_STR);
	$req->bindParam(':user', $_POST['user'], PDO::PARAM_STR);
	$req->bindParam(':author', $_POST['author'], PDO::PARAM_STR);
	$req->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
	$req->bindParam(':chapo', $_POST['chapo'], PDO::PARAM_STR);
	$req->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
	$req->bindParam(':change_date', $_POST['change_date'], PDO::PARAM_STR);
    $req->execute(array(':id' => $_POST['idd'],':user' => $_POST['user'], ':author' => $_POST['author'], ':title' => $_POST['title'], ':chapo' => $_POST['chapo'], ':content' => $_POST['content'], ':change_date' => $_POST['change_date']));
    //header('Location: vue/ajouter.php');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
    
};
//Je suis contraint de faire de requête INSERT INTO car les données message et author ne sont pas dans la même table.
function add_comment( /*$author,*/ $message)
{
    global $bdd;
    
try
{
	$req = $bdd->prepare('INSERT INTO comment VALUES (/*:id, :user_id, :blog_post_id,*/ :message)');
	//$req->bindValue(':id', $_GET[''], PDO::PARAM_STR); // via la méthode get je n'ai pas fait transiter cette donnée
	//$req->bindValue(':user_id', $_GET[''], PDO::PARAM_STR); // via la méthode get je n'ai pas fait transiter cette donnée
	//$req->bindValue(':author', $_GET['nom'], PDO::PARAM_STR);
	$req->bindValue(':message', $_GET['message'], PDO::PARAM_STR);
	


    $req->execute();
    //header('Location: vue/ajouter.php');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
}

function add_author_comment( $author)
{
    global $bdd;
    
try
{
	$req = $bdd->prepare('INSERT INTO user VALUES (/*:id, :user_id, :blog_post_id,*/ :pseudo)');
	//$req->bindValue(':id', $_GET[''], PDO::PARAM_STR); // via la méthode get je n'ai pas fait transiter cette donnée
	//$req->bindValue(':user_id', $_GET[''], PDO::PARAM_STR); // via la méthode get je n'ai pas fait transiter cette donnée
	$req->bindValue(':pseudo', $_GET['nom'], PDO::PARAM_STR);
	//$req->bindValue(':message', $_GET['message'], PDO::PARAM_STR);
	


    $req->execute();
    //header('Location: vue/ajouter.php');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
}


function conexion()
{
	global $bdd;
	$ne= array();
	$req= $bdd ->query('SELECT pseudo FROM user');
	while ($data = $req->fetchall()) 
	{
		
		$ne = $data;
		return $ne;
	}
};

function conexio()
{
	global $bdd;
	$ne= array();
	$req= $bdd ->query('SELECT password FROM user');
	while ($data = $req->fetchall()) 
	{
		
		$ne = $data;
		return $ne;
	}
};

function getComments($postId)
{
    global $bdd;
    $comments = $bdd->prepare('SELECT id, user_id, blog_post_id, message, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE blog_post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

?>
