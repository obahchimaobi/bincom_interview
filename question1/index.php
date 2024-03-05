<?php
require __DIR__.'/../includes/dbconn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta State Polling Unit Results</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-xl-6 m-auto">
            <h3 class="text-center mb-5">Delta State Polling Unit Results</h3>
            <form action="results.php" method="post">
                <label for="local_government">Select Polling Unit:</label>
                <select name="polling_unit" id="local_government" class="form-control">
                    <?php

                    // Query to get local governments in Delta State
                    $sql = "SELECT * FROM polling_unit";
                    $result = mysqli_query($connection, $sql);

                    // Check if any results found
                    while ($results = mysqli_fetch_assoc($result)) {
                        $polling_uniqueid = $results['uniqueid'];
                        $polling_id = $results['polling_unit_id'];
                        $polling_number = $results['polling_unit_number'];
                        $polling_name = $results['polling_unit_name'];
                    ?>
                        <option value="<?php echo $polling_uniqueid ?>"><?php echo $polling_number ?></option>
                    <?php } ?>
                </select>
                <br>
                <button type="submit" class="btn btn-info">Show Results</button>
            </form>
        </div>
    </div>

    <div id="results">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>