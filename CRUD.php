<?php 
	$conn new mysqli("localhost","root","","crud") OR die("Error: " mysqli_error($conn));
	if(isset($_POST['save'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username=$_POST['username'];
			$password=$_POST['password'];

			$iQuery = "INSERT INTO account(username,password) values(?,?)";

			$stmt = $conn->prepare($iQuery);
			$stmt->bind_param("ss","$username","$password");
			if($stml->execute()){
				$_SESSION['msg'] ="New Record is successfully inserted";
				$_SESSION['alert'] ="alert alert-success";
			}
			$stmt->close();
			$conn->close();
		}
		else{
			$_SESSION['msg'] ="Username and password should bot be empty";
			$_SESSION['alert'] ="alert alert-warning";	
		}
		header("location:index.php");
	}

?>