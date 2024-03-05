<?php
require __DIR__.'/../includes/dbconn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Government Polling Unit Results (Delta State)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-xl-6 m-auto">
            <h3 class="text-center">Local Government Polling Unit Results (Delta State)</h3>
            <form action="result.php" method="post">
                <select name="lga" id="" class="form-control">
                    <?php

                    // Query to get local governments in Delta State
                    $sql = "SELECT * FROM lga";
                    $result = mysqli_query($connection, $sql);

                    // Check if any results found
                    while ($results = mysqli_fetch_assoc($result)) {
                        $polling_uniqueid = $results['uniqueid'];
                        $lga_id = $results['lga_id'];
                        $lga_name = $results['lga_name'];
                    ?>
                        <option value="<?php echo $polling_uniqueid ?>"><?php echo $lga_name ?></option>
                    <?php } ?>
                </select>
                <br>
                <button type="submit" class="btn btn-info">Show Results</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>