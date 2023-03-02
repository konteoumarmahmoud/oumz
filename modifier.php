    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <a href="admin.php">Retourner à la page admin</a>    
    <?php
        
        if (isset($_REQUEST["id"])) {//&&isset($_POST["mdp"])){
            $i = $_REQUEST["id"];
            include("conn.php");

            try{
                $conn = new PDO("mysql:host=$server;dbname=$bd",$user,$mdp);
                $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "SELECT * FROM etudiant WHERE Id = '$i'";
                $result = $conn->query($sql);

                foreach($result as $r){
                    $t1= $r['Prenom'];
                    $t2= $r['Nom'];
                    $t3= $r['Email'];
                    $t4=$r['Adresse'];
                    $t5= $r['Telephone'];
                }
            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }
            
    ?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <div id="container1">
            <span>
                Id 
                <input type="text" name="id" value="<?php echo $i;?>" >
                <br>
            </span>
            <span>
                Prenoms
                <input type="text" name="prenoms" value="<?php echo $t1;?>">
                <br>
            </span>
            <span>
                Nom
                <input type="text" name="nom" value="<?php echo $t2;?>">
                <br>
            </span>
            <span>
                Email
                <input type="text" name="email" value="<?php echo $t3;?>">
                <br>
            </span>
            <span>
                Adresse
                <input type="text" name="adresse" value="<?php echo $t4;?>">
                <br>
            </span> 
            <span>
                Telephone
                <input type="text" name="tel" value="<?php echo $t5;?>">
                <br>
            </span>
            <span>
                Mot de pass
                <input type="password" name="mdp">
                <br>
            </span>
            
            
        </div>
        <input type="submit" value ="confirmer" onclick="if(window.confirm('Voulez-vous vraiment Modifier ?')){return true;}else{return false;}">
    </form>

    <?php
        if(isset($_REQUEST['id']) && isset($_REQUEST['prenoms']) && isset($_REQUEST['nom']) && isset($_REQUEST['email']) && isset($_REQUEST['adresse']) && isset($_REQUEST['tel'])){        
            $t1 = $_REQUEST['prenoms'];
            $t2 = $_REQUEST['nom'];
            $t3 = $_REQUEST['email'];
            $t4 = $_REQUEST['adresse'];
            $t5 = intval($_REQUEST['tel']);                
            $id = $_REQUEST['id'];
         
            $sql  = "UPDATE etudiant SET Prenom = '$t1', Nom = '$t2', Email = '$t3', Adresse = '$t4', Telephone = '$t5' WHERE Id = '$id' ";
            $statement = $conn->prepare($sql);
            $statement->execute();              
                
            header("Location:admin.php?msg=Modification réussi");
         
        } 
        
    ?>

</body>
</html>