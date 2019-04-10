<?php
 try
 {
     // On se connecte à MySQL
     $bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root');
 }
 catch(Exception $e)
 {
     // En cas d'erreur, on affiche un message et on arrête tout
         die('Erreur : '.$e->getMessage());
 }
 
    if(isset($_POST['ajout']))
    {
        $ajout=$_POST['ajout'];
      

        $ajout = $bdd->exec("INSERT INTO todos (faire) VALUES ('$ajout')");
    }

    if(isset($_POST['fait'])){
       foreach($_POST['checkbox'] as $check) {
        $del= $bdd->exec("DELETE FROM todos WHERE faire = '$check'"); 
        //$del= $bdd->exec("DELETE FROM Archive WHERE archive = '$check'"); 
        $del= $bdd->exec("INSERT INTO Archive (archive) VALUES ('$check')");
        

       } 
    }
    header ('Location: http://localhost/todolist/');
?>