<?php
include 'DB.php'; // we want to use this db.php information




if (mysqli_connect_errno($con))
{ 
echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
else 
{ 
	$username = $_POST ['newUserLog'];
	$result = $con->query ( "SELECT * FROM users where UserName = '$username'");
	

	if ($result->num_rows > 0) {   //if found one match - inform that userName already exists
		//echo "eli kelev good";  
		//header('Location: http://localhost/AfekaBook/index.html');  //go to location
		$html = new DOMDocument(); 
		@$html->loadHTMLFile('index.html'); 
		$html->getElementById('errDiv')->nodeValue = 'Username Already Exists!';
		$html->saveHTMLFile("tryAgain.html");	

	header('Location: http://localhost/AfekaBook/tryAgain.html');  //go to location
	}
	else 
	{
		echo $_POST['gender'];
		echo  "eli kelev not good";   //register him
		$sql = "INSERT INTO users (FName, LName, UserName, Password, Gender)  VALUES ("."'".$_POST ['newUserFName']."'".","."'".$_POST ['newUserLName']."','". $username."','". $_POST ['newUserPass']."',1)";
		if ($con->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	
	}
	
}






/*
echo $username;
$result = $mysqli->query ( "SELECT * FROM users where UserName = $username" );

while ( $result->fetch_object () ) { // another option 2
	print_r ( $result->fetch_assoc () ); // print
	echo "eli kelev";
}
  */  
    
   
   