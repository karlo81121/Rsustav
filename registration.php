<?php

    $name = filter_input(INPUT_POST, 'name');
    $username = filter_input(INPUT_POST, 'username');
    $county = filter_input(INPUT_POST, 'county');
    $city = filter_input(INPUT_POST, 'city');
    $postalcode = filter_input(INPUT_POST, 'postal');
	$email = filter_input(INPUT_POST, 'email1');
	$password = filter_input(INPUT_POST, 'pass1');
          
                $host = "localhost";
			    $dbusername = "najjaciUser";
			    $dbpassword = "ltdh-101fm8112";
			    $dbname = "users";

			    //Create connection

			    $con = new mysqli($host, $dbusername, $dbpassword, $dbname);

			    if(mysqli_connect_error()){
				    die('Connect Error ('.mysqli_connect_errno() .') '.mysqli_connect_error());
			    }
			    else {
				    $sql = "INSERT INTO company (name, username, county, city, postalcode, email, password) VALUES ('$name','$username','$county','$city','$postalcode','$email','$password')";
				    if($con->query($sql)){
					    header('Location: successfulRegistration.html');
				    }
				    else{
					    echo "Error: ".$sql."<br>".$con->error;
				        }
				    $con->close();
			    }

?>