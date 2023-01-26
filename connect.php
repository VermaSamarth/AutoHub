<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$maxfar = $_POST['maxfar'];
	$minfar = $_POST['minfar'];
	$Dest = $_POST['Dest'];
	$locia = $_POST['locia'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, phone, maxfar, minfar, Dest, locia) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("siiiss", $name, $phone, $maxfar, $minfar, $Dest, $locia);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>