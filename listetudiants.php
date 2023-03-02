<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
   if(isset($_REQUEST["msg"])){
      echo "<br>";
          $b=$_REQUEST["msg"];
             echo "<span style='color:red'> $b</span>";

}

 include("conn.php");
   try {
      //connexion au serveur de BD
         $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp);
      // Définir le mode d'erreur PDO comme l'exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
      //recupération login et mdp saisie par le user

      //on vérifie si le login et le mdp correspondent au login et au mdp d'un user  stockés dans la table 
   
        $sql = "SELECT * FROM etudiant ";
         $result = $conn->query($sql);
    //affichage   
        if ($result->rowCount() > 0) {
     ?>  
     <?php
       if(isset($_REQUEST["table"])){
      echo "<br>";
          $t=$_REQUEST["table"];
             echo "<span style='text_aligne:center'>$t</span>";

} ?>
       <div class="table table bordered"> <table class="table table bordered" >
          <tr>
            <th>Id</th>
            <th>Prenoms</th>
            <th>Nom</th>
            <th>login</th>
            <th>mdp</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Supprimer</th>
            <th>Modifier</th>
          </tr>
          </div>  
          
         <?php 
        // Afficher les données de chaque ligne
            while($row = $result->fetch(PDO::FETCH_NUM)) {
            //$id=$row["Id"];
              echo "<tr>";
                 foreach($row as $valeur){
                      echo "<td> $valeur </td>";
            }
            ?>
                <td>
                    <a href="supprimer.php?id=<?=$row[0]?>">supprimer</a>
               </td>
               <td>
                    <a href="modifier.php?id=<?=$row[0]?>"> modifier</a>
              </td>
            <?php
               echo "</tr>";
        }
               echo "</table>";
        
        } else {
        echo "0 results";}

         
  }      catch(PDOException $e){
          echo "Connection failed: " . $e->getMessage();
}


   if (!empty($str)) {
         $stmt = $conn->prepare("SELECT * FROM etudiant WHERE nom LIKE :str");
         $stmt->bindParam(':str', '%' . $str . '%');
}    else {
         $stmt = $conn->prepare("SELECT * FROM etudiant");
}
        $stmt->execute();
        $result = $stmt->fetchAll();

?>

<script>
        // Récupération de l'élément HTML pour afficher le résultat
          let resultElement = document.getElementById('p');

      // Gestionnaire d'événement pour le bouton de soumission
          function submitForm() {
    // Récupération des données du formulaire
          let data = document.getElementById('form').elements.namedItem('input').value;

   // Création de l'objet XMLHttpRequest
         let xhr = new XMLHttpRequest();

  // Configuration de la requête HTTP
        xhr.open('POST', 'listetudiants.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Envoi de la requête HTTP
        xhr.send('data=' + encodeURIComponent(data));

  // Fonction de rappel de la requête
        xhr.onload = function() {
              if (xhr.status === 200) {
      // Mise à jour de l'élément HTML avec la réponse de listetudiants.php
               resultElement.innerHTML = xhr.responseText;
         } else {
      // Affichage d'un message d'erreur
           resultElement.innerHTML = 'Error: ' + xhr.status;
    }
  }
}

</script>

</body>
</html>