<?php

//database connection
/** @var mysqli $db */

require_once "includes/database.php";


//Get the result set from the database with a SQL query
$query = "SELECT * FROM reserveringen";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

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
            <a class="button is dark" href=" create.php">
                <strong>Reserveren</strong>
            </a>
        </div>
    </div>


</nav>




<body>

<div class="container px-4">
    <h1 class="title mt-4">Reserveringen</h1>
    <hr>
    <table class="table is-bordered is-striped  is-hoverable is-fullwidth">
        <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>E-mail</th>
            <th>Date</th>
            <th>Time</th>
            <th>Persons</th>
            <th>Number</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="9" class="has-text-centered">&copy; Kumpir Corner</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($reserveringen as $index => $reservering) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $reservering['firstName'] ?></td>
                <td><?= $reservering['lastName'] ?></td>
                <td><?= $reservering['mail'] ?></td>
                <td><?= $reservering['date'] ?></td>
                <td><?= $reservering['time'] ?></td>
                <td><?= $reservering['persons'] ?></td>
                <td><?= $reservering['number'] ?></td>
                <td><a href="details.php?id=<?= $reservering['id'] ?>">Details</a></td>
                <td><a href="delete.php?id=<?= $reservering['id'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
