<?php
//database connection
/** @var mysqli $db */

require_once "includes/database.php";



//Get the result set from the database with a SQL query
$query = "SELECT * FROM reserveringen";
$result = mysqli_query($db, $query) or die ('Error: ' . $query );

//Loop through the result to create a custom array
$reserveringen = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reserveringen[] = $row;
}
//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Reserveringen</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="img/kumpirlogo.png" height="33">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="index.php">
                Home
            </a>

            <a class="navbar-item" href="reserveringen.php">
                Alle reserveringen
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Informatie
                </a>

                <div class="navbar-dropdown" >
                    <a class="navbar-item" href="menu.html">
                        Onze menu
                    </a>
                    <a class="navbar-item" href="allergie.html">
                        Allergie-informatie
                    </a>
                    <a class="navbar-item" href="locatie.html">
                        Locatie
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="contact.html">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar-end">
        <div class="navbar-item">
            <div class="buttons">
                <a class="button is dark" href=" create.php">
                    <strong>Reserveren</strong>
                </a>
            </div>
        </div>
    </div>
    </div>
</nav>

<div class="card">
    <div class="card-content">
        <div class="content">
            Kumpir Corner & More is sinds 2015 gevestigd op de Schiedamseweg, in Rotterdam.
            Wij serveren heerlijke koffie, espresso en thee, en voor zowel ontbijt,
            lunch als diner kunt u in het restaurant terecht.
            Er is een ruime keuze uit diverse menu's, belegde broodjes, pita's, panini's,
            burgers, vers fruit, smoothies en frisdrank. En natuurlijk heerlijke <strong>Kumpir</strong>!
        </div>
    </div>
</div>


</body>
</html>

