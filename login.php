<?php

$login=false;
$showError= false;

$host="localhost:3306";
$user="root";
$pass="";
$database="registration";



$conn=mysqli_connect($host,$user,$pass, $database);

if(isset($_POST['login']))
{
    $aadharcard=$_POST['aadharcard'];
    
    $pass =$_POST['pass'];
		$sql="select * from `registration` . `registration` where aadharcard ='$aadharcard' AND password ='$pass' ";
		$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)==1)	
			{
				$login=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['aadharcard']=$aadharcard;
                
                header("location: voter.php");
			}	
			else
			{
				$showError="invalid credentials";
			}
		
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    if($login){
   echo "<p class='container'>'You are logged in'</p>";}
    ?>
<?php
    if($showError){
   echo "<p class='container'>'$showError'</p>";}
    ?>
</body>
</html>