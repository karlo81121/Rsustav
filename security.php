<?php

    $dbhost = "localhost";
    $dbusername = "najjaciUser";
    $dbpassword = "ltdh-101fm8112";
    $dbname = "users";

    $con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die("Nije moguće povezati se na server.");

?>


<!DOCTYPE html>
<html>

    <head>

        <title>PROJEKTI - SIGURNOST I ZAŠTITA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="category.css">

    </head>

<body>


    <div class="traka"> <!-- zelena traka -->

        <a href="index.html"><h2><i>R sustav</i></h2></a>

    </div> <!-- kraj zelene trake -->


    <form action="search.php" method="GET">
        <input type="text" name="tags" id="tags" placeholder="Tražim nešto određeno... ">
        <input type="submit" name="pretrazi" id="pretrazi" value="Pretraži">
    </form>


    <hr class="pocetna_linija">


    <div id="kutija">

<?php

    $index = 1;

    $sql = "SELECT * FROM project WHERE Kategorija = 'Sigurnost i zaštita';"; 
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);

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

            <p><?php echo 'Nema objavljenih projekata.'; ?></p>

<?php

         }

?>  

    </div>

</body>

</html>