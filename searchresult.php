<?php
require ('conn.php');
$return = '';

// $query = $queryId; 
//$conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp);
// Définir le mode d'erreur PDO comme l'exception
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$servername = "localhost";
$username = $user;
$password = $mdp; 
$bdname = $bd;


//$myConnection= mysqli_connect("$d","$dbname","$db_pass", "mrmagicadam") or die ("could not connect to mysql"); 
//$sqlCommand="SELECT id, linklabel FROM pages ORDER BY pageorder ASC";
//$query=mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));

$conn = mysqli_connect($servername, $username, $password,$bdname);

/*if(isset($_POST["query"]))
{
	$searchid = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchPrenom = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchNom = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchEmail = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchTelephone = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchAdresse = mysqli_real_escape_string($conn, $_POST["query"]);
	
	$queryId = "SELECT * FROM etudiant
	WHERE id  LIKE '%".$searchid."%'";

	$queryNom = "SELECT * FROM etudiant
	WHERE prenom LIKE '%".$searchPrenom."%' ";

	$queryPrenom = "SELECT * FROM etudiant
	WHERE nom LIKE '%".$searchNom."%'";

	$queryEmail = "SELECT * FROM etudiant
	WHERE email LIKE '%".$searchEmail."%'";

	$queryTelephone = "SELECT * FROM etudiant
	WHERE telephone LIKE '%".$searchTelephone."%'";

	$queryAdresse = "SELECT * FROM etudiant
	WHERE adresse LIKE '%".$searchAdresse."%'";

}*/if(isset($_POST["query"]))
{	
	$t = $_POST["query"];
	$searchid = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchPrenom = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchNom = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchEmail = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchTelephone = mysqli_real_escape_string($conn, $_POST["query"]);
	$searchAdresse = mysqli_real_escape_string($conn, $_POST["query"]);
	
	$queryId = "SELECT * FROM etudiant
	WHERE id  LIKE '%".$searchid."%'";
	$result = mysqli_query($conn, $queryId);
	if(mysqli_num_rows($result) > 0)
	{
		$return .='
		<div class="table-responsive">
		<table class="table table bordered">
		<tr>
			<th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Adresse</th>
		</tr>';
		while($row1 = mysqli_fetch_array($result))
		{
			$return .= '
			<tr>
				<td>'.$row1["Id"].'</td>
				<td>'.$row1["Prenom"].'</td>
				<td>'.$row1["Nom"].'</td>
				<td>'.$row1["Email"].'</td>
				<td>'.$row1["Telephone"].'</td>
				<td>'.$row1["Adresse"].'</td>
			</tr>';
		}
		echo $return;
		}
	else
	{
	$queryNom = "SELECT * FROM etudiant
	WHERE prenom LIKE '%".$searchPrenom."%' ";
	$result = mysqli_query($conn, $queryNom);
	if(mysqli_num_rows($result) > 0)
	{
		$return .='
		<div class="table-responsive">
		<table class="table table bordered">
		<tr>
			<th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Adresse</th>
		</tr>';
		while($row1 = mysqli_fetch_array($result))
		{
			$return .= '
			<tr>
				<td>'.$row1["Id"].'</td>
				<td>'.$row1["Prenom"].'</td>
				<td>'.$row1["Nom"].'</td>
				<td>'.$row1["Email"].'</td>
				<td>'.$row1["Telephone"].'</td>
				<td>'.$row1["Adresse"].'</td>
			</tr>';
		}
		echo $return;
		}
	else
	{

	$queryPrenom = "SELECT * FROM etudiant
	WHERE nom LIKE '%".$searchNom."%'";
	$result = mysqli_query($conn, $queryPrenom);
	if(mysqli_num_rows($result) > 0)
	{
		$return .='
		<div class="table-responsive">
		<table class="table table bordered">
		<tr>
			<th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Adresse</th>
		</tr>';
		while($row1 = mysqli_fetch_array($result))
		{
			$return .= '
			<tr>
				<td>'.$row1["Id"].'</td>
				<td>'.$row1["Prenom"].'</td>
				<td>'.$row1["Nom"].'</td>
				<td>'.$row1["Email"].'</td>
				<td>'.$row1["Telephone"].'</td>
				<td>'.$row1["Adresse"].'</td>
			</tr>';
		}
		echo $return;
		}
	else
	{
	$queryEmail = "SELECT * FROM etudiant
	WHERE email LIKE '%".$searchEmail."%'";
	$result = mysqli_query($conn, $queryEmail);
	if(mysqli_num_rows($result) > 0)
	{
		$return .='
		<div class="table-responsive">
		<table class="table table bordered">
		<tr>
			<th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Adresse</th>
		</tr>';
		while($row1 = mysqli_fetch_array($result))
		{
			$return .= '
			<tr>
				<td>'.$row1["Id"].'</td>
				<td>'.$row1["Prenom"].'</td>
				<td>'.$row1["Nom"].'</td>
				<td>'.$row1["Email"].'</td>
				<td>'.$row1["Telephone"].'</td>
				<td>'.$row1["Adresse"].'</td>
			</tr>';
		}
		echo $return;
		}
	else
	{

		$queryTelephone = "SELECT * FROM etudiant
		WHERE telephone LIKE '%".$searchTelephone."%'";
		$result = mysqli_query($conn, $queryTelephone);
		if(mysqli_num_rows($result) > 0)
		{
			$return .='
			<div class="table-responsive">
			<table class="table table bordered">
			<tr>
				<th>ID</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Email</th>
				<th>Telephone</th>
				<th>Adresse</th>
			</tr>';
			while($row1 = mysqli_fetch_array($result))
			{
				$return .= '
				<tr>
					<td>'.$row1["Id"].'</td>
					<td>'.$row1["Prenom"].'</td>
					<td>'.$row1["Nom"].'</td>
					<td>'.$row1["Email"].'</td>
					<td>'.$row1["Telephone"].'</td>
					<td>'.$row1["Adresse"].'</td>
				</tr>';
			}
			echo $return;
			}
		else
		{
	
		$queryAdresse = "SELECT * FROM etudiant
		WHERE adresse LIKE '%".$searchAdresse."%'";
		$result = mysqli_query($conn, $queryAdresse);
		if(mysqli_num_rows($result) > 0)
		{
			$return .='
			<div class="table-responsive">
			<table class="table table bordered">
			<tr>
				<th>ID</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Email</th>
				<th>Telephone</th>
				<th>Adresse</th>
			</tr>';
			while($row1 = mysqli_fetch_array($result))
			{
				$return .= '
				<tr>
					<td>'.$row1["Id"].'</td>
					<td>'.$row1["Prenom"].'</td>
					<td>'.$row1["Nom"].'</td>
					<td>'.$row1["Email"].'</td>
					<td>'.$row1["Telephone"].'</td>
					<td>'.$row1["Adresse"].'</td>
				</tr>';
			}
			echo $return;
			}
		else
		{
			echo 'No results found.';
		}}}}}}
	//if (t == $queryId || t == $queryNom || t == $queryPrenom || t == $queryEmail || t == $queryTelephone || t == $queryAdresse)

}
else
{
	$query = "SELECT * FROM etudiant";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
	$return .='
	<div class="table-responsive">
	<table class="table table bordered">
	<tr>
		<th>ID</th>
		<th>Prenom</th>
		<th>Nom</th>
		<th>Email</th>
		<th>Telephone</th>
		<th>Adresse</th>
	</tr>';
	while($row1 = mysqli_fetch_array($result))
	{
		$return .= '
		<tr>
			<td>'.$row1["Id"].'</td>
			<td>'.$row1["Prenom"].'</td>
			<td>'.$row1["Nom"].'</td>
			<td>'.$row1["Email"].'</td>
			<td>'.$row1["Telephone"].'</td>
			<td>'.$row1["Adresse"].'</td>
		</tr>';
	}
	echo $return;
	}
else
{
	echo 'No results found.';
}
}
?>


<form method="POST" action="">
  <label for="search">Rechercher :</label>
  <select name="search_by">
    <option value="id">Id</option>
    <option value="prenoms">Prénoms</option>
    <option value="nom">Nom</option>
    <option value="email">Email</option>
    <option value="adresse">Adresse</option>
    <option value="telephone">Téléphone</option>
  </select>
  <input type="text" name="search_query" placeholder="Entrez votre recherche">
  <input type="submit" name="search" value="Rechercher">
</form>