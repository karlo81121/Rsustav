<?php

$_DB_host = "localhost";
$_DB_username = "najjaciUser";
$_DB_password = "ltdh-101fm8112";
$_DB_name = "users";

if(isset($_GET['username']) && isset($_GET['password'])){

    $username = $_GET['username'];
    $password = $_GET['password'];

    $con = mysqli_connect($_DB_host, $_DB_username, $_DB_password, $_DB_name) or die("Nije moguće povezati se na server.");
    mysqli_select_db($con, $_DB_name) or die("Nije moguće pronaći bazu podataka.");

    $userquery = mysqli_query($con, "SELECT * FROM company WHERE username = '$username' && password = '$password'") or die("Nije moguće izvršiti zahtjev. Pokušajte ponovno kasnije.");

    if(mysqli_num_rows($userquery) != 1){
        header('Location: wrong_password.html');
    }

    while($row = mysqli_fetch_array($userquery)){
        $name = $row['Name'];
        $user = $row['Username'];
        $county = $row['County'];
        $city = $row['City'];
        $postal_code = $row['PostalCode'];
        $email = $row['Email']; 
     }

?>

    <html>
        <head>

            <style type="text/css">

                body {
                    background-color: #F2F2F2;
                    height: 1200px;
                    width: 2000px;
                    overflow-x: hidden;
                }

                #traka {
                    background-color:#009578;
                    border: 1px solid #009578;
                    width: 2000px;
                    height: 55px;
                    position: relative;
                    top: -10px;
                    left: -8px;
                }

                h2 {
                    font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                    font-size: 35px;
                    font-weight: bold;
                    color: #FFFFFF;
                    position: relative;
                    top: -18px;
                    left: 100px;
                }

                h1 {
                    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
                    position: relative;
                    top: 100px;
                    left: 200px;
                    color: #006651;
                }

                p {
                    font-family: Verdana;
                    font-size: 1em;
                    color: #000000;
                }

                #p1 {
                    position: relative;
                    top: 150px;
                    left: 200px;
                }

                #p2 {
                    position: relative;
                    top: 160px;
                    left: 200px;
                }

                #p3 {
                    position: relative;
                    top: 170px;
                    left: 200px;
                }

                #p4 {
                    position: relative;
                    top: 180px;
                    left: 200px;
                }

                #projekt {
                    position: relative;
                    top: -25px;
                    left: 680px;
                }

                .pocetna_linija {
                    position: relative;
                    top: -60px;
                    left: 160px;
                    width: 50%;
                }

                a {
                    text-decoration: none;
                }

                h3 {
                    font-family: Verdana;
                    font-size: 28px;
                    font-weight: bold;
                }

            </style>

        </head>

        <body>

            <div id="traka">

                <a href="Index.html"><h2><i>R sustav</i></h2></a>
            
            </div>

            <h1><?php echo $name; ?> d.o.o</h1>

                <div id="p1">
                    <p>Županija: <?php echo $county; ?></p>
                </div>

                <div id="p2">
                    <p>Grad: <?php echo $city; ?></p>
                </div>

                <div id="p3">
                    <p>Poštanski broj: <?php echo $postal_code; ?></p>
                </div>

                <div id="p4">
                    <p>E-mail: <?php echo $email; ?></p>
                </div>
                

<hr class="pocetna_linija">

<div id="projekt">
        
<?php

$index = 1;

$sql = "SELECT * FROM project WHERE VlasnikProjekta = '$username';"; 
$result = mysqli_query($con, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){

?>

        <h3><?php echo $index; ?>. PROJEKT: <?php echo $row['NazivProjekta']; ?></h3>
        <p><i><b>Kategorija: </b></i><?php echo  $row['Kategorija'] ?></p>

        <i><p><b>Izvršni direktor: </b></i>
            <?php echo $row['Direktor']; ?>
        </p>

        <i><p><b>E-mail: </b></i>
            <?php echo $row['Mail']; ?>
        </p>

        <i><p><b>Kontakt broj: +385 </b></i>
            <?php echo $row['Kontakt']; ?>
        </p>

        <i><p><b>Opis projekta: </b></i>
            <?php echo $row['OpisProjekta']; ?>
        </p>

        <i><p><b>Suradnici: </b></i>
            <?php echo $row['Suradnici']; ?>
        </p>

        <br>
        <br>
                
<?php 

        $index++; 

    }
}
else {

?>

        <p><?php echo 'Trenutno nemate objavljenih projekata.'; ?></p>

<?php

     }
}

else {
    die("Potrebno je upisati korisničko ime.");
}

?>

</div>

</body>
</html> 