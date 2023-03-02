
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
   </head>
   <body>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
   <div id="container1">
       
       <span>
           Prenoms
           <input type="text" name="Prenom" >
           <br>
       </span>
       <span>
           Nom
           <input type="text" name="Nom" >
           <br>
       </span>
       <span>
           Email
           <input type="text" name="Email" >
           <br>
       </span>
       <span>
           Adresse
           <input type="text" name="Adresse" >
           <br>
       </span> 
       <span>
           Telephone
           <input type="text" name="Telephone" >
           <br>
       </span>
       <span>
           Mot de pass
           <input type="password" name="mdp">
           <br>
       </span>
       
       
   </div>
   <input type="submit" value ="confirmer" onclick="if(window.confirm('Voulez-vous vraiment ajouter ?')){return true;}else{return false;}">
 </form>
   </body>
   </html>
   
 <?php
   include("conn.php");
   try {
     $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(isset($_REQUEST ['Nom'])){

 
      $id = $_POST['Id'];
      $nom = $_POST['Nom'];
      $prenom = $_POST['Prenom'];
      $login=$_POST['longin'];
      $Email = $_POST['Email'];
      $Adresse = $_POST['Adresse'];
      $Telephone = $_POST['Telephone'];
    
      $sql = "insert into etudiant (id,nom,prenom,Email,Adresse,Telephone) values('$id','$nom','$prenom','$Email','$Adresse','$Telephone')";
      $result = $conn->query($sql);

      header("location:admin.php");
   }
      
  } catch (Exception $e) {
      
  }  
      
?>






</body>
</html>
</body>
</html>