

<?php
// Uploads files
$username=$_POST['username'];
if(isset($_POST['username']))  ; 
if(isset($_POST['full_name']))      $full_name=$_POST['full_name'];
if(isset($_POST['email']))          $email=$_POST['email'];
if(isset($_POST['telephone']))      $telephone=$_POST['telephone'];
if(isset($_POST['date_naissance'])) $date_naissance=$_POST['date_naissance'];
if(isset($_POST['password'])) $password=$_POST['password'];
if(isset($_POST['password-confirm'])) $password_confirm=$_POST['password-confirm'];
$dbh = new PDO('mysql:host=localhost;dbname=zarguan_tp_ecommerce', 'root', '');
//if ($password == $password_confirm){
    $role = 'client';
    $created_at = date("Y-m-d H:i:s");
$dbh->query("INSERT INTO utilisateur
 ( username, full_name,email,telephone,date_naissance,password,role,created_at_u,updated_at_u) 
 VALUES ('$username','$full_name','$email','$telephone', '$date_naissance', 
        '$password', '$role', '$created_at','$created_at') ");
//header ("Refresh: 1;URL=signup.php");
//}

 ?>
