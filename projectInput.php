<?php

    $naziv_projekta = filter_input(INPUT_POST, 'naziv');
    $vlasnik_projekta = filter_input(INPUT_POST, 'vlasnik');
    $direktor = filter_input(INPUT_POST, 'direktor');
	$mail = filter_input(INPUT_POST, 'email');
    $kontakt = filter_input(INPUT_POST, 'kontakt');
    $opis_projekta = filter_input(INPUT_POST, 'opis');
    $kategorija = filter_input(INPUT_POST, 'kategorija');
    $tagovi = filter_input(INPUT_POST, 'tagovi');
    $suradnici = filter_input(INPUT_POST, 'suradnici');
          
    $host = "localhost";
	$dbusername = "najjaciUser";
	$dbpassword = "ltdh-101fm8112";
	$dbname = "users";

	$connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

		if(mysqli_connect_error()){
			die('Neuspješno povezivanje ('.mysqli_connect_errno() .') '.mysqli_connect_error());
		}
		else {
			$sql = "INSERT INTO project (NazivProjekta, VlasnikProjekta, Direktor, Mail, Kontakt, OpisProjekta, Kategorija, Tagovi, Suradnici) VALUES ('$naziv_projekta','$vlasnik_projekta','$direktor','$mail','$kontakt','$opis_projekta','$kategorija','$tagovi','$suradnici')";
				
            if($connection->query($sql)){
				header('Location: uspjesno_projekt.html');
			}
			else{
				echo "Error: ".$sql."<br>".$connection->error;
			}

			$connection->close();
		}

?>