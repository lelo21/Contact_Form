<?php
// gesting the fields name as defined in html form
$name = $_POST['name'];
$email = $_POST['email'];
$messageform = $_POST['messageform'];

// database conncetion
$conn = new mysqli('localhost','root','','contactDB');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into ContactTB(ContactName, ContactEmail, ContactMessage) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $messageform);
		$execval = $stmt->execute();
		
		//$sql = "SELECT ContactName, ContactEmail, ContactMessage FROM ContactTB ORDER BY date";
		//$result = $conn->query($sql);

		
		echo "information submited with success";
		$stmt->close();
		$conn->close();
	}

?>