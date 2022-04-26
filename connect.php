<?php
	
header('Location: index.html');
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('35.223.147.196','root','Witco2020','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		if ( false===$execval) {
  
			die('execute() failed: ' . htmlspecialchars($stmt->error));
}

		
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}


exit();
?>
