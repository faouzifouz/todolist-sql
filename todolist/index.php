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


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/todolist/styles.css"/>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Todolist</title>
</head>
<body>
<section>



<h1>TODOFOUZ</h1>
<form action="exe.php" method="post">
  
  <?php

    $resultat = $bdd->query('SELECT * FROM todos');

    echo '<table>';
    echo '<tr>';
    echo '<th>'."A faire"."</th>";   
    echo '</tr>';
    
  while ($donnees = $resultat->fetch())
  {
    
  echo '<tr>';
  echo"<th><input type='checkbox' name='checkbox[]' value='".$donnees['faire']."'></th>";
  echo '<th class="scroll">'.$donnees['faire'].'</th>';
  echo '</tr>';
}
  echo '</table>';


?>

    <input type="submit" name="fait" value="Enregistrer"/>

    
    <?php

$resultat = $bdd->query('SELECT * FROM Archive');

echo '<table>';
echo '<tr>';
echo '<th>'."Archive"."</th>";   
echo '</tr>';

while ($donnees = $resultat->fetch())
{

echo '<tr>';
echo"<th><input type='checkbox' checked disabled name='checkbox[]' value='".$donnees['archive']."'></th>";
echo '<th class="barre">'.$donnees['archive'].'</th>';
echo '</tr>';
}
echo '</table>';


?>
</section>
<section class="cat1">
<h2>Ajouter tache</h2>
</form>
    <form action="exe.php" method="post">  
      <input type="text" name="ajout" placeholder="Ajout" />
      <input type="submit" name='insert' value="ajouter"/>
    </form>
    
 
</section>
</body>
</html>

