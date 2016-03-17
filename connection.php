<?php
    $servername = "cosc304.ok.ubc.ca";
    $username = "btruong";
    $password = "btruong";
    $dbname = "db_btruong";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        echo "Connected to LOCALHOST (myDataSet) successfully"; 
    }

    //$sql = "SELECT kid, FROM Year2013";
    //$result = mysqli_query($conn, $sql);

    mysqli_close($conn);
?>
