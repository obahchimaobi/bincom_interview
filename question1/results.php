<?php

require __DIR__.'/../includes/dbconn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <br><br><br>
    <table class="table col-xl-6 m-auto table-bordered table-hover">
        <h4 class="text-center">Result Page</h4>
        <thead class="thead-dark">
            <tr>
                <th scope="col">Polling Unit Party</th>
                <th scope="col">Total Votes Cast</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Selected local government from the form
            $local_government = $_POST["polling_unit"];

            // Query to get polling units for the selected local government
            $sql = "SELECT * FROM announced_pu_results WHERE polling_unit_uniqueid = '$local_government'";

            $result = mysqli_query($connection, $sql);

            // Check if any results found
            if ($result->num_rows > 0) {

                // Loop through each row and display polling unit information
                while ($row = $result->fetch_assoc()) {
                    $polling_unit_name = $row["party_abbreviation"];
                    $total_votes = $row['party_score']; // Call function to get total votes

                    //echo "<tr><td>$polling_unit_name</td><td>$total_votes</td></tr>";


            ?>
                    <tr>
                        <th scope="row"><?php echo $polling_unit_name?></th>
                        <td><?php echo $total_votes?></td>
                    </tr>
            <?php

                }
            } else {
                $fetch_name = mysqli_query($connection, "SELECT * FROM polling_unit WHERE uniqueid = '$local_government'");

                if(mysqli_num_rows($fetch_name) > 0) {
                    while($poll = mysqli_fetch_assoc($fetch_name)) {
                        $polling_unitName = $poll['polling_unit_name'];
                    }
                }
                echo "<h6 class='text-center'>No polling units found for $polling_unitName.</h6>";
            }

            // Function to get total votes for a specific polling unit
            // function get_total_votes($connection, $polling_unit_id)
            // {
            //     $sql = "SELECT COUNT(*) AS total_votes FROM polling_unit WHERE polling_unit_id = '$polling_unit_id'";
            //     $result = $connection->query($sql);
            //     $row = $result->fetch_assoc();
            //     return $row["total_votes"];
            // }
            ?>
        </tbody>
    </table>
</body>

</html>