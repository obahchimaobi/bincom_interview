<?php
require __DIR__.'/../includes/dbconn.php';
require __DIR__.'/../includes/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Parties</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-xl-6 m-auto">
            <h4>Add New Party</h4>
            <br>
            <?php echo myErrorMsg(); echo mySuccessMsg(); ?>
            <form action="add-party.php" method="post">
                <label for="">Polling Unit: </label>
                <input type="text" class="form-control" name="polling_unit" required>
                <label for="" class="mt-3">Party Name: </label>
                <input type="text" class="form-control" name="party_name" required>
                <label for="" class="mt-3">Party Score: </label>
                <input type="text" class="form-control" name="party_score" required>
                <br>
                <button class="btn btn-info" type="submit" name="add_party_score">Add</button>
            </form>
        </div>
    </div>
</body>

</html>