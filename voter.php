<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: 01_login.html");
  exit;
}

  $host="localhost:3306";
  $user="root";
   $pass="";
  $database="registration";
   $conn=mysqli_connect($host,$user,$pass, $database);
   $aadharcard=$_SESSION['aadharcard'];
  $name="";
  $mobile="";
  $state="";
  $city="";
  $address="";
  $status="";
  $sql1= "select * from  `registration` where aadharcard ='$aadharcard'";
  $result1=mysqli_query($conn,$sql1);
  $sql2="select * from votes where aadharcard='$aadharcard' ";
  $result2=mysqli_query($conn,$sql2);

				while($row=mysqli_fetch_assoc($result1))
				{
					$name=$row['name'];
					$mobile=$row['mobile'];
					$state=$row['state'];
					$city=$row['city'];
					$address=$row['address'];
				}



        if(mysqli_num_rows($result2)==1)
				{
					$status="Voted";
					$color="green";
				}
				else{
					$status="Not Voted";
					$color="red";
        }
        mysqli_close($conn); 

?>



<!DOCTYPE html>
<html>
<head>
	<title>Voter_page</title>
  <link rel="stylesheet" href="common_style.css">
</head>

<style>

 
.right-section{
	width:60%;
  margin-right: 1%;
  margin-top: 5%;
  margin-left: 2%;
	float:right;
  
}
.left-section{

width: 30%;
float:left;
margin-top: 100px;
width:30%;
  font-size: 20px;  
  margin-left: 5%;
  background-color: white;
  width:25%;
  border-radius: 3%;
  border: 2px solid red;
  
  }

.candidates-details{
    background-color:white;
	width:90%;
	height: 50%;
	border-radius: 2%;
	border:2px solid red;
  margin-top: 40px;

}
  tr td{
	padding:15px;

}
input{
	margin-left: 50px;
	padding: 10px;
	width:80px;
	background-color: rgb(60, 246, 53 );
}
input:hover{
	cursor: pointer;
	background-color: rgb(23, 131, 19 );
	color:white;
} 

#logo{
  margin: 0px 10px;
}
#logo img{
  height: 67px;
  margin: 3px 5px;
}

.image img{
  width: 100%;
  position: absolute;
  z-index: -1;
  height: 90%;
  z-index: -1;
  opacity: 0.9;
}


.btn{
    font-family: 'Baloo Bhaina 2', cursive;
    margin: 0px 500px;
    background-color: yellow;
    padding: 4px 5px;
    border: 2px solid red;
    border-radius: 10px;
    font-size: 18px;
    cursor: pointer;
    width: 11%;
	
   
}
.btn a {
    list-style: none;
    text-decoration: none;
	color: black;

}

</style>
  <body>

    
    
    <nav class="navbar">
      <div id="logo">
        <img src="vote.jpg" alt="Online Voting System">
      </div>
      
      <ul class="navList">
        <h3 class="head"><strong>Online Voting System</strong></h3>
        
        <button class="btn"><a href= "01_login.html">Logout</a></button>
        
        
        
        
        welcome- 
        <?php echo $name;
       
                      
               ?>
        </ul>
        </nav>
   <div class="image">
       <img src="background.jpg" alt="vote">
   </div>

   <!-- <div class="left-section">
   welcome-  <?php echo $_SESSION['aadharcard']."<br><div class='test'>Name :  ".$name."</div>".
              "<br><div class='test'> state : ".$state."</div>".
              "<br><div class='test'> Mobile : ".$mobile."</div>".
              "<br><div class='test'> City : ".$city."</div>".
              "<br><div class='test'> Address : ".$address."</div>".
              "<br><div class='test'> status : ".$status."</div>";
             
     ?>
   </div>

       
         -->


         <div class="left-section">
        	<div class="profile"><br><br>
        	
        		<table> 
          
        			<tr><td>welcome</td><td>-</td><td><strong><?php echo" $name";?></strong></td></tr>
        			<tr><td>Mobile </td><td>:</td><td><strong><?php echo" $mobile";?></strong></td></tr>
        			<tr><td>State </td><td>:</td><td><strong><?php echo" $state";?></strong></td></tr>
        			<tr><td>City </td><td>:</td><td><strong><?php echo" $city";?></strong></td></tr>
        			<tr><td>Address </td><td>:</td><td><strong><?php echo" $address";?></strong></td></tr>
        			<tr><td>Aadhar No. </td><td>:</td><td><strong><?php echo" $aadharcard";?></strong></td></tr>
        			
        			<tr><td>Status</td><td>:</td><td><strong><p style="color:<?php echo" $color";?>">
        			<?php echo"$status";?></p></strong></td></tr>
        		</table>
        	
        	</div>
        </div>

        <div class="right-section">
        	<div class="candidates-details">
        	<form action="vote_submit.php" method="post">
        		<table>
        			<tr><td><strong>1.</strong></td><td><h3>Bhartiya Janata Party (BJP)</h3></td><td><img  class="logo" src="bjp.jpg" style="width:110px; height:90px;margin-top: -10px;margin-left:70px;"></td><td><input type="submit" name="btn1" value="Vote"></td></tr>

        			<tr><td><strong>2.</strong></td><td><h3>Congress</h3></td><td><img  class="logo"  src="congress.jpg"  style="width: 80px; height: 60px;margin-top: 5px;margin-left: 75px;" ></td><td><input type="submit" name="btn2" value="Vote"></td></tr>

        			<tr><td><strong>3.</strong></td><td><h3> Bahujan Samaj Party</h3></td><td><img  class="logo"  src="bsp.jpg" style="width: 80px; height: 70px; border-radius: 50% ;margin-top:-5px;margin-left: 70px;"></td><td><input type="submit" name="btn3" value="Vote"></td></tr>

        			<tr><td><strong>4.</strong></td><td><h3> Aam Aadmi Party (AAP)</h3></td><td><img class="logo"   src="app.jpg"  style="width: 90px; height: 70px; margin-top: 0px;margin-left: 70px;border-radius: 50% ;" ></td><td><input type="submit" name="btn4" value="Vote"></td></tr>

        		</table>
        	</form>
        	</div>
        </div>


        	
       
        		


</body>
</html>