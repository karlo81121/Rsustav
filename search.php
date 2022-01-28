<?php 

    $host = "localhost";
	$dbusername = "najjaciUser";
	$dbpassword = "ltdh-101fm8112";
	$dbname = "users";

	$connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if(mysqli_connect_error()){
		die('Neuspješno povezivanje ('.mysqli_connect_errno() .') '.mysqli_connect_error());
	}

    if(isset($_GET['tags'])){
        $pretrazi = $_GET['tags'];

    $sql = "SELECT * FROM project WHERE Tagovi LIKE '%$pretrazi%' ";

?>

    <br><br><br><br><br><br>

<?php

    $query = mysqli_query($connection, $sql) or die('Nije moguće pretražiti');

    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($pretrazi == NULL){
        header('Location: emptyInput.html');
    }

?>


<!DOCTYPE html>
<html>

    <head>

        <title>Tražim nešto određeno...</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="search.css">

    </head>

<body>


    <div class="traka"> <!-- zelena traka -->

        <h2><i>R sustav</i></h2>

    </div> <!-- kraj zelene trake -->


    <hr class="pocetna_linija">

    <div id="kutija">

<?php

    $index = 1;


    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){

?>

            <h1><?php echo $index; ?>. PROJEKT: <?php echo $row['NazivProjekta']; ?></h1>
            
            <p><i><b>Kategorija: </b></i><?php echo  $row['Kategorija'] ?></p>

            <p><i><b>Vlasnik projekta: </b></i><?php echo $row['VlasnikProjekta'] ?></p>

            <i><p><b>Izvršni direktor: </b></i>
                <?php echo $row['Direktor']; ?>
            </p>

            <i><p><b>E-mail: </b></i>
                <?php echo $row['Mail']; ?>
            </p>

            <i><p><b>Kontakt broj: +385</b></i>
                <?php echo $row['Kontakt']; ?>
            </p>

            <i><p><b>Opis projekta: </b></i>
                <?php echo $row['OpisProjekta']; ?>
            </p>

            <i><p><b>Suradnici: </b></i>
                <?php echo $row['Suradnici']; ?>
            </p>

            <br>

            <hr class="granica">

            <br>
                    
<?php 

    $index++;  

        }
    }
    else {

?>

        <p>
            <?php echo 'Nema objavljenih projekata.'; ?>
        </p>

<?php

        }
    }

?>

    </div>


</body>
</html>