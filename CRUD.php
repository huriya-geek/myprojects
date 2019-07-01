<?php 
	$conn new mysqli("localhost","root","","crud") OR die("Error: " mysqli_error($conn));
	if(isset($_POST['save'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username=$_POST['username'];
			$password=$_POST['password'];

			$iQuery = "INSERT INTO account(username,password) values(?,?)";

			$stmt = $conn->prepare($iQuery);
			$stmt->bind_param("ss",$username,$password);
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
	if(isset($_POST['delete'])){
		$id = $_POST['delete'];

		$dQuery = "DELETE from account where id = ?";
		$stmt  = $conn->prepare($dQuery);
		$stmt->bind_param('i',$id);
		if($stml->execute()){
				$_SESSION['msg'] ="New Record is successfully deleted";
				$_SESSION['alert'] ="alert alert-success";
			}
			$stmt->close();
			$conn->close();
			header("location:index.php");
		}
	}
	if(isset($_POST['edit'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$id=$_POST['edit'];

			$uQuery = "UPDATE account SET username=?, password=? where id=?";

			$stmt = $conn->prepare($uQuery);
			$stmt->bind_param("ssi",$username,$password,$id);
			if($stml->execute()){
				$_SESSION['msg'] ="New Record is successfully updated";
				$_SESSION['alert'] ="alert alert-success";
			}
			$stmt->close();
			$conn->close();
			header("location:index.php");
		}
	}
?>
