<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Details</title>
</head>
<body>
    <h2 style="color: green;">Informations détaillées de l'étudiant</h2>
    <a href="admin.php">Retourner à la page admin</a> <br>
    <?php
        include("conn.php");
        $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM etudiant ";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            $student = $result->fetch();
            echo "Id: ".$student['Id']."<br><br>";
            echo "Prenom :".$student['Prenom']."<br><br>";
            echo "Nom : ".$student['Nom']."<br><br>";
            echo "Email : ".$student['Email']."<br><br>";
            echo "Adresse : ".$student['Adresse']."<br><br>";
            echo "Telephone : ".$student['Telephone']."<br><br>";
        }
        else {
            echo "Cette ID n'existe pas";
        }
    ?>
    
</body>
</html>