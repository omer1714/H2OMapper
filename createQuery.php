<?php


if (isset($_POST['submit'])) { //if submission form pressed
    $mysqli = mysqli_connect("cosc304.ok.ubc.ca", "btruong", "btruong", "db_btruong");

    $kid = filter_input(INPUT_POST, 'kid');
    $billable_serv_id = filter_input(INPUT_POST, 'billable_serv_id');
    $service_addr = strtolower(filter_input(INPUT_POST, 'service_addr'));
    $type = filter_input(INPUT_POST, 'type');
    $rate_code = filter_input(INPUT_POST, 'rate_code');
    $from_date = filter_input(INPUT_POST, 'from_date'); #customer asking for range
    $to_date = filter_input(INPUT_POST, 'to_date');
    // $bill_date = filter_input(INPUT_POST, 'bill_date');
    $consump = filter_input(INPUT_POST, 'consump');

    //Sum or Average radio toggle chosen, otherwise will output all of them
    $consumpsum = filter_input(INPUT_POST, 'consumpsum');
    $consumpavg = filter_input(INPUT_POST, 'consumpavg');

    $sql = "SELECT kid, billable_serv_id, service_addr, type, rate_code, bill_date,";

    if($consumpsum != null or $consumpavg != null){
        if ($consumpsum != null and $consumpavg != null){
            $sql .= "SUM(bill_hist.consump) AS consumpsum, AVG(bill_hist.consump) AS consumpavg";
        }
        else if ($consumpsum != null){
            $sql .= "SUM(bill_hist.consump) AS consumpsum";
        }
        else if ($consumpavg != null){
            $sql .= "AVG(bill_hist.consump) AS consumpavg";
        }        

    }
    else{
        $sql .= " consump";
    }

    $sql .=" FROM bill_hist ";

   if ($kid != null or $billable_serv_id != null or $service_addr != null or $type != null or $rate_code != null or $from_date != null or $to_date != null or $consump != null) {
       $sql .= "WHERE ";
       $count = 0;
       if ($kid != null) {
           $sql .= "kid = " . $kid;
           $count += 1;
       }
       if ($billable_serv_id != null) {
           if ($count > 0) {
               $sql .= " AND ";
           }
           $sql .= "billable_serv_id = " . $billable_serv_id;
           $count += 1;
       }
       if ($service_addr != null) {
           if ($count > 0) {
               $sql .= " AND ";
           }
           $sql .= "service_addr = \"" . $service_addr . "\"";
           $count += 1;
       }
       if ($type != null) {
           if ($count > 0) {
               $sql .= " AND ";
           }
           $sql .= "type = \"" . $type . "\"";
           $count += 1;
       }
       if ($rate_code != null) {
           if ($count > 0) {
               $sql .= " AND ";
           }
           $sql .= "rate_code = " . $rate_code;
           $count += 1;
       }
       if ($from_date != null & $to_date != null) {
           if ($count > 0) {
               $sql .= " AND ";
           }
           $sql .= "bill_date BETWEEN #".$from_date."# AND #".$to_date."#";
           $count += 1;
       }       


       // if ($bill_date != null) {
       //     if ($count > 0) {
       //         $sql .= " AND ";
       //     }
       //     $sql .= "bill_date = " . $bill_date;
       //     $count += 1;
       // }
       if ($consump != null) {
           if ($count > 0) {
               $sql .= " AND ";
           }
           $sql .= "consump = " . $consump;
           $count += 1;
       }
   }
    if($consumpsum != null or $consumpavg != null){
        $sql .= " GROUP BY kid";
    }

    echo $sql."</br>";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        if ($result = mysqli_query($mysqli, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf("<h1>%s %s %s %s %s %s %s </h1></br>", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
//            echo $row[2]. $row[1];
        }
        // Free result set
        mysqli_free_result($result);
    }



#--------------------------------------------------------------------------
# KEEP THIS CODE HERE BECAUSE ITS FOR CREATING CSV FILE OFF OF QUERY OUTPUT 
#--------------------------------------------------------------------------

##$result IS EMPTIED BY THE PRINT ON THE SCREEN STATEMENT
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$myfile = fopen("outfile.csv", "w") or die('Unable to open file');

$txt = "kid,billable_serv_id,service_addr,type,rate_code,bill_date,consump";
fwrite($myfile, $txt);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    // while ($row = mysqli_fetch_row($result)){    
        fwrite($myfile, "\n" . $row["kid"] . "," . $row["billable_serv_id"] . "," . $row["service_addr"] . "," . $row["type"] . "," . $row["rate_code"] . "," . $row["bill_date"] . "," . $row["consump"] . "");
    }
} else {
    echo "0 results";
}

fclose($myfile);





}
?>
<html>
    <head>
        <title>database access</title>
    </head>
    <body>
        <?php
        echo "<body style='background-color:bisque'></body>";
        ?>

    </body>
</html>