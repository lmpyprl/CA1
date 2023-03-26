<?php 

	$servername = "localhost"; 
	$username = "root";
	$password="";
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	//declares variables using information sent from HTML form
    $name = $_POST["bookname"];
    $ticketnumber = $_POST["ticketnumber"];
	$email = $_POST["email"];
	$cost = $_COST["cost"];
    
	//declares SQL query
    $sql = "INSERT INTO bookings (bookingName, ticketnumber, email, cost)
    VALUES ('$name', $ticketnumber, '$email', '$cost')";
	
	//attempts to execute sql query
	if(mysqli_query($conn, $sql)){
		echo "New record created successfully";
		
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	//closes SQL connection
	mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
		//Timeout function that returns user to referrring page after 2000ms
        setTimout("window.location = '<?php echo $_SERVER['HTTP_REFERER'] ?>'", 2000);
    </script>

</head>
<body>
	<!-- Displays user's name and amount of tickets booked-->
    Welcome <?php echo $_POST["bookname"]; ?><br>
    Tickets Booked: <?php echo $_POST["ticketnumber"]; ?>
</body>
</html>