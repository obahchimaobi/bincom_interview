<?php 
require __DIR__.'/../includes/dbconn.php';
require __DIR__.'/../includes/functions.php';

if (isset($_POST['add_party_score'])) {
    # code...
    $polling_unit = mysqli_real_escape_string($connection, htmlspecialchars(strip_tags($_POST['polling_unit'])));
    $party_name = mysqli_real_escape_string($connection, htmlspecialchars(strip_tags($_POST['party_name'])));
    $party_score = mysqli_real_escape_string($connection, htmlspecialchars(strip_tags($_POST['party_score'])));

    // add the data into the database
    if(empty($polling_unit) && empty($party_name) && empty($party_score)) {
        echo "All fields must be filled";
        header('Location: index.php');
    }
    else {
        // send the data
        $insert = "INSERT INTO new_parties(polling_unit, party_name, party_score) VALUES('$polling_unit', '$party_name', '$party_score')";
        $query = mysqli_query($connection, $insert);

        if($query) {
            $_SESSION['successMsg'] = "Data successfully added";
            header('Location: index.php');
        }
        else {
            $_SESSION['errorMsg'] = "Data was not send";
            header('Location: index.php');
        }
    }
}

