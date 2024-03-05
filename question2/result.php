<?php

// importing my database connection
require __DIR__ . '/../includes/dbconn.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-xl-6 m-auto">
            <table class="table table-light table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Total Column</th>
                        <th>Party Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['lga'])) {
                        $uniqueid = mysqli_real_escape_string($connection, $_POST['lga']);
                        $getResults = mysqli_query($connection, "SELECT party_abbreviation, SUM(party_score) AS total_sum FROM announced_pu_results WHERE polling_unit_uniqueid = '$uniqueid'");

                        if (mysqli_num_rows($getResults) > 0) {
                            while ($results = mysqli_fetch_assoc($getResults)) {
                                $party_score = $results['total_sum'];
                                $party_abbr = $results['party_abbreviation'];

                    ?>
                            <tr>
                                <td>Total</td>
                                <td><?php echo $party_score ?></td>
                            </tr>
                    <?php }
                    } } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>