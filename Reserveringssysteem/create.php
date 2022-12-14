<?php
/** @var mysqli $db */


//Require database in this file & image helpers
require_once "includes/database.php";
require_once 'reservering-data.php';

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $mail       = $_POST['mail'];
    $date       = $_POST['date'];
    $time       = $_POST['time'];
    $persons    = $_POST['persons'];
    $number     = $_POST['number'];

    //Require the form validation handling
    require_once "form-validation.php";

    $db = mysqli_connect(
        hostname: 'localhost',
        username: 'root',
        password: '',
        database: 'Reservering_data'
    );

    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO reserveringen (firstName, lastName, mail, date, time, persons, number)
                  VALUES ('$firstName', '$lastName' , '$mail','$date', '$time', '$persons', '$number')";
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        $id = mysqli_insert_id($db);
        //Close connection
        mysqli_close($db);

        // Redirect to index.php
        header('Location: confirmation.php?id='.$id);
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Create reservering</title>
</head>


<nav
        class="navbar" role="navigation" aria-label="main navigation">
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
        </div>
    </div>
</nav>


<body>
<div class="container px-4">
    <h1 class="title mt-4">Maak een nieuwe reservering</h1>

    <section class="box">
        <form method="post" action="">
        <div class="box" >
            <div class="field">
                <label class="label">Voornaam</label>
                <div class="control">
                    <input class="input" id="firstName" type="text" name="firstName" value="<?= $firstName ?? '' ?>"/>
                </div>
                <p class="help is-danger">
                    <?= $errors['firstName'] ?? '' ?>
                </p>
            </div>
        </div>

            <div class="box" >
                <div class="field">
                    <label class="label">Achternaam</label>
                    <div class="control">
                        <input class="input" id="lastName" type="text" name="lastName" value="<?= $lastName ?? '' ?>" required/>
                    </div>
                    <p class="help is-danger">
                        <?= $errors['lastName'] ?? '' ?>
                    </p>
                </div>
            </div>

            <div class="box">
                <div class="field">
                    <label class="label">E-mail</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" id="email" type="text" name="mail" value="<?= $mail ?? '' ?>" required/>
                        <p class="help is-danger">
                            <?= $errors['mail'] ?? '' ?>
                        </p>
                        <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                        <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    </div>
                </div>
            </div>

        <div class="box">
            <div class="control">
                <label for="reservation">Gewenste dag</label>
                <input class="input" id="date" type="date" name="date" value="<?= $day ?? '' ?>"required/>
            </div>
            <p class="help is-danger">
                <?= $errors['date'] ?? '' ?>
            </p>
        </div>


        <div class="box">
            <label for="time">Gewenste tijdstip</label>
            <input class="input" id="time" type="time" name="time" value="<?= $time ?? '' ?>"required/>
            <small>Reserveren kan van 09:00 tot 19:00</small>
            <p class="help is-danger">
                <?= $errors['time'] ?? '' ?>
            </p>
        </div>


        <div class="box">
            <label for="personen" >Aantal personen</label>
            <input class="input" id="persons" type="text" name="persons" value="<?= $persons ?? '' ?>"required/>
        </div>
        <p class="help is-danger">
            <?= $errors['persons'] ?? '' ?>
        </p>


        <div class="box">
            <div class="field">
                <label  class="label">Telefoonnummer</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" id="number" type="text" name="number" value="<?= $number ?? '' ?>"required/>
                    <p class="help is-danger">
                        <?= $errors['number'] ?? '' ?>
                    </p>
                    <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                </div>
            </div>
        </div>


            <div class="control">
                <button type="submit" name="submit" class="button is-dark">Reserveer nu!</button>
            </div>


        </form>
    </section>
    <a class="button mt-4" href="index.php">&laquo; Go back to the list</a>
</div>
</body>
</html>
