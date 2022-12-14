<?php
/** @var mysqli $db */
require_once "includes/database.php";


//Retrieve the GET parameter from the 'Super global'
$reserveringId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM reserveringen WHERE id = '$reserveringId'";
$result = mysqli_query($db, $query);


$reservering = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <title>confirmation</title>
</head>
<body>


<div class="columns is-centered mt-6">
    <div class="box column is-half">
        <p class="box has-text-weight-bold	">Uw reservering is succesvol doorgestuurd naar ons, we zien u graag op:</p>
        <div class="columns is-mobile">
            <div class="column is-one-quarter">
                <p class="box is-italic	"><?= $reservering['date']?></p>
            </div>
            <div class="column is-one-quarter ">
                <p class="box is-italic	"><?=$reservering['time'] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="columns is-centered">
    <div class="box column is-half">
        <p class="box has-text-weight-bold	">Uw gegevens:</p>
        <div class="columns is-mobile ">
            <div class="column is-one-quarter">
                <p class="box is-italic	"><?= $reservering['firstName']?></p>
            </div>
            <div class="column is-one-quarter">
                <p class="box is-italic	"><?=$reservering['lastName'] ?></p>
            </div>
            <div class=" column is-half">
                <p class="box is-italic"><?=$reservering['mail'] ?></p>
            </div>
        </div>
        <div class="columns is-mobile ">
            <div class=" column is-half">
                <p class="box is-italic"><?=$reservering['number'] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="columns is-centered">
    <div class="box column is-half href="index.php"">
        <p class="box has-text-weight-bold has-text-centered">Ga terug </p>
    </div>
</div>


</body>
</html>