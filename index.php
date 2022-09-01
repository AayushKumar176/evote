 <?php
// $insert =false;


// if(isset($_POST['name'])){

//     $server="localhost";
//     $username="root";
//     $password="";

//     $con= mysqli_connect($server, $username , $password);

//     if(!$con){
//         die("Connection to this database failed due to" .mysqli_connect_error());
//     }

//     // echo "Success connect to the db";

//     $name =$_POST['name'];
//     $mobile =$_POST['mobile'];
//     $state =$_POST['state'];
//     $city =$_POST['city'];
//     $aadharcard =$_POST['aadharcard'];
//     $address =$_POST['address'];
//     $pass =$_POST['pass'];
//     $confirmpass =$_POST['confirmpass'];
    

    
    
//     $sql= "INSERT INTO `registration` .`registration` ( `name`, `mobile`, `state`, `city`, `aadharcard`, `address`, `password`, `confirm`, `dt`) VALUES ( '$name', '$mobile', '$state', '$city', '$aadharcard', '$address', '$pass', '$confirmpass', current_timestamp());";
//     // echo $sql;
    
//     if($con->query($sql)==true){
//       $insert =true;
//       // echo"successfully inserted";
//     }
//     else {
//       echo "ERROR: $sql <br> $con->error";
//     }


//     $con->close();
// }
?> 

<?php

$insert=false;
$showAlert= false;
$showAlert2= false;
$server="localhost";
    $username="root";
    $password="";

    $con= mysqli_connect($server, $username , $password);

  // storing the filed data into variables

      


  if(isset($_POST['name']))
  {

    $name =$_POST['name'];
    $mobile =$_POST['mobile'];
    $state =$_POST['state'];
    $city =$_POST['city'];
    $aadharcard =$_POST['aadharcard'];
    $address =$_POST['address'];
    $pass =$_POST['pass'];
    $confirmpass =$_POST['confirmpass'];
         if($pass!=$confirmpass)
            {
              $showAlert= "Password do not match";
           }
         else
            {

             if(!$con)
                  {
                  die('Page Not found: connection failed');
                   }


             else
               {
                    $sql1="select * from `registration` . `registration` where aadharcard='$aadharcard' ";
                    $result=mysqli_query($con,$sql1);
                    if(mysqli_num_rows($result)==1)
                    {
                        $showAlert2= "User already registered";
                    }
                    else
                    {
                      $sql= "INSERT INTO `registration` .`registration` ( `name`, `mobile`, `state`, `city`, `aadharcard`, `address`, `password`, `confirm`, `dt`) VALUES ( '$name', '$mobile', '$state', '$city', '$aadharcard', '$address', '$pass', '$confirmpass', current_timestamp());";
                      if($con->query($sql)==true){
                              $insert =true;
                              // echo"successfully inserted";
                            }
                            else {
                              echo "ERROR: $sql <br> $con->error";
                            }

                    }
    
                }
            }
  }
    $con->close();
?>



<html>
	<head>
	<link rel="stylesheet" href="common_style.css">
	</head>
  <style>



.formoutline{
	background-color: white;
	width:60%;
	height: 75%;
	border-color:lightgreen;
	position:relative;
	top:5%;
	left:20%;
	border-radius: 2%;
	background:transparent;
	background-color: rgb(74, 72, 70  );

}
.Registration{
	text-align: center;
	position: relative;
	top:4%;
	font-size:30px;
	color:rgb(12, 11, 24);

}
.Register{
	text-align: center;
	position: relative;
	top:4%;
	font-size:25px;
	color:black;

}
.form{
	position: relative;
	top:10%;
	left:12%;
}
input{
	margin-left:30px;
	padding:15px;
	margin-left:15%;
	float:left; 
	width:300px;
	border-color:rgb(100, 244, 49 );
	border-radius:5px;
	border-width:.5px;
	text-decoration: none;
	box-sizing: border-box;
}
.btn:hover{
	background-color: rgb(217, 56, 0  );
}
.btn{
	color:white;
	background-color: blue;
	text-align: center;
	position: relative;
	margin-top: 5px;
  margin-left: 195px;

}
td{
	margin-top:0px;
	padding:5px;
}
#date{
	width: 10%;
}

</style>
<body>
  <nav class="navbar">
    <div id="logo">
        <img src="vote.jpg" alt="Online Voting System">
    </div>

    <ul class="navList">
        <h3 class="head"><strong>Online Voting System</strong></h3>
        <li class="item"><a href="01_login.html">Home</a></li>
        <li class="item"><a href="about.html">About</a></li>
        <li class="item"><a href="contact.html">Representative</a></li>
    </ul>
    </nav>
   <div class="image">
       <img src="background.jpg" alt="vote">
   </div>

  <div class="formoutline">
   	<h3 class ="Registration">E-Voting System Registration</h3>

    <?php
    if($insert ==true){
   echo "<p class='Register'>Registration Done Successfully</p>";}
    ?>
    <?php
    if($showAlert ==true){
   echo "<p class='Register'>'$showAlert'</p>";}
    ?>
    <?php
    if($showAlert2 ==true){
   echo "<p class='Register'>'$showAlert2'</p>";}
    ?>
   


   <div class ="form">
   		<form  action="index.php" method="post">

   			<table>
   				<tr ><td><input type="text" name="name" placeholder="Enter your Name*" required=""></td>
   				      <td><input type="tel" name="mobile" placeholder=" Enter your Mobile No."></td></tr>
                 
                 
                 <tr><td><input type="text" name="state" placeholder="Enter your State"></td>
                  <td><input type="text" name="city" placeholder="Enter your City"></td></tr>
                  
                  <tr><td><p class ="date"><input type="text" name="aadharcard" placeholder="Enter your Aadhar Number*" required=""></p></td>
                    <td><h3><input type="text" name="address" placeholder="Address"></h3></td></tr>
                    <tr><td><input type="password" name="pass" placeholder="Password*" required="" ></td>
                     <td><input type="password" name="confirmpass" placeholder="Confirm password*" required=""></td></tr>
             
   				<tr><td><input type="file"  name="photo" placeholder="Upload Image"></td></tr>	

   			</table>
   			<input  class ="btn" type="submit" name="register" value="Register">
         <!-- <button class="button"><a href="index.php">Register</a></button> -->

   		</form>
      	</div>

   	</div>

    
    
</body>
</html> 



