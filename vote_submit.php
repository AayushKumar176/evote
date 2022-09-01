<?php


session_start();

                $host="localhost:3306";
				$user="root";
				$pass="";
				$db="registration";
				$conn=mysqli_connect($host,$user,$pass,$db);

                $aadharcard=$_SESSION['aadharcard'];

				$sql0="select * from votes where aadharcard='$aadharcard' ";
				$result0=mysqli_query($conn,$sql0);

		if(mysqli_num_rows($result0)==1)
		  {
		  	header('location:vote_check.php');
		  }

		else{
				if(isset($_POST['btn1']))
				{
					$party="bjp";	
				}
				elseif (isset($_POST['btn2']))
				{
					$party="congress";
				}
				elseif (isset($_POST['btn3']))
				{
					$party="bsp";
				}
				elseif (isset($_POST['btn4']))
				{
					$party="aap";
				}

				$sql="insert into `registration` . `votes`(`aadharcard` , `party`) values('$aadharcard','$party')";
				
				$result=mysqli_query($conn,$sql);

				header('location:thank_you.php');
			}

				session_destroy();
				

?>