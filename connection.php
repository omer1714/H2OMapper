<?php
    $servername = "localhost";
    $username = "user";
    $password = "password";
    $dbname = "myDataSet";

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
