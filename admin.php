<?php session_start();
 if(!isset($_SESSION["login"])){
       
    header("Location: index.php?msg1= Vous etes deconnecté.Veuillez vous connecter svp!");
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    
    <title>Document</title>

   
</head>
<body style="background: yellow">
        <div class="h1">  <h1 style="color: blue;background-color: yellow">Page Admin</h1> </div>
   <div id="a"> 
                  <h2 style="color: yellow"><a href="index.php">index</a></h2>
                 <h3><a href="deconnexion.php">Deconnecter</a></h3>
    </div>
            <p id ="liste"></p>
<script>
       function showTable(str) {
          let xhttp;
                   if (str == "") {
               document.getElementById("liste").innerHTML = "";
                   return;
    }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
              document.getElementById("liste").innerHTML = this.responseText;
        }
    };
        xhttp.open("GET", "listetudiants.php?q="+str, true);
        xhttp.send();
}


   // Récupération de l'élément HTML pour afficher le résultat
      let  resultElement = document.getElementById('p');

    // Gestionnaire d'événement pour le bouton de soumission
     function submitForm() {
    // Récupération des données du formulaire
      let data = document.getElementById('form').elements.namedItem('input').value;

   // Création de l'objet XMLHttpRequest
      let  xhr = new XMLHttpRequest();

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
     }  else {
      // Affichage d'un message d'erreur
            resultElement.innerHTML = 'Error: ' + xhr.status;
    }
  };
}
</script>

<script>
window.onload = function() {
  showTable();
}
</script>
<div style="color: red;background-color: red" id="a">
<h4 style="color:red;"><a href="ajouter.php">ajouter un utilisateur</a></h4>
<br>
<h5><a href="details.php">LE DETAILS D'UN ETUDIANT</a></h5>
</div>
<script>
function searchStudents() {
  // Récupération de la valeur du champ de recherche
  let searchValue = document.querySelector("input[name=search]").value;

  // Envoi d'une requête AJAX pour récupérer les résultats de la recherche
     let xhr = new XMLHttpRequest();
      xhr.open("POST", "listetudiants.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
                   if (xhr.readyState == 4 && xhr.status == 200) {
      // Mise à jour du tableau avec les résultats de la recherche
                document.querySelector("#students-table tbody").innerHTML = xhr.responseText;
    }
  }
  xhr.send("search=" + searchValue);
}
</script>
<div class="container-fluid">       
<div class="content-wrapper">
	<div class="container">
		<h1 style="color: red">recherche par:</h1>
		<div class="row">
		<div class="col-xs-12">
			<div id="result"></div>
		</div>
		</div>	
		<div class="row pt-3">
			<div class="col-xs-1">
				<label  >Id</label>
				<input type="text" name="searchid" id="searchid"  class="form-control" />
			</div>
			<div class="col-xs-2">
				<label>Prenom</label>
				<input type="text" name="searchPrenom" id="searchPrenom"  class="form-control" />
			</div>
			<div class="col-xs-2">
				<label>Nom</label>
				<input type="text" name="searchNom" id="searchNom"  class="form-control" />
			</div>
			<div class="col-xs-3">
				<label>Email</label>
				<input type="text" name="searchEmail" id="searchEmail"  class="form-control" />
			</div>
			<div class="col-xs-2">
				<label>Telephone</label>
				<input type="text" name="searchTelphone" id="searchTelphone"  class="form-control" />
			</div>
			<div class="col-xs-2">
				<label>Adresse</label>
				<input type="text" name="searchAdresse" id="searchAdresse"  class="form-control" />
			</div>
		</div>	
	</div>
</div>
</div>	

<script>

	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"searchresult.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}

		$('#searchid').keyup(function(){
		var searchid = $(this).val();
		if(searchid != '')
		{
			load_data(searchid);
		}
		else
		{
			load_data();
		}
		});

		$('#searchPrenom').keyup(function(){
		var searchPrenom = $(this).val();
		if(searchPrenom != '')
		{
			load_data(searchPrenom);
		}
		else
		{
			load_data();
		}
		});

		$('#searchNom').keyup(function(){
		var searchNom= $(this).val();
		if(searchNom != '')
		{
			load_data(searchNom);
		}
		else
		{
			load_data();
		}
		});

		$('#searchEmail').keyup(function(){
		var searchEmail= $(this).val();
		if(searchEmail != '')
		{
			load_data(searchEmail);
		}
		else
		{
			load_data();
		}
		});

		$('#searchTelephone').keyup(function(){
		var searchTelephone= $(this).val();
		if(searchTelephone != '')
		{
			load_data(searchTelephone);
		}
		else
		{
			load_data();
		}
		});

		$('#searchAdresse').keyup(function(){
		var searchAdresse= $(this).val();
		if(searchAdresse != '')
		{
			load_data(searchAdresse);
		}
		else
		{
			load_data();
		}
		});

	});

	</script>

  





    
</body>
</html>