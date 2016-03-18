<?php ?>

<html>
    <head>
        <title>database access</title>
    </head>
    <body>
<?php
echo "<body style='background-color:bisque'></body>";

//echo getcwd();

    $mysqli = mysqli_connect("cosc304.ok.ubc.ca", "btruong", "btruong", "db_btruong");
    $sql = "SELECT * FROM bill_hist ";
//    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    if ($result = mysqli_query($mysqli, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf("<h1>%s %s %s %s %s %s %s </h1></br>", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
//            echo $row[2]. $row[1];
        }
        // Free result set
        mysqli_free_result($result);
    }



//mysqli_close($mysqli);
?>

    </body>
</html>