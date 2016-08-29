<?php
		
		if($_POST){
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				//$select = mysqli_select_db('test');
				mysqli_select_db($conn,"test");
				$new = "INSERT INTO selected_members (User, Member_name, Email, Password, Gender, Admin)
				VALUES ('".$_POST['user']."','".$_POST['name']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['gender']."', '".$_POST['admin']."')";

				if ($conn->query($new) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}		
		$conn->close();
	}				
	?>