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

    $COperation = filter_input (INPUT_POST, 'COperation');

    //Sum or Average radio toggle chosen, otherwise will output all of them
    $consumpsum = filter_input(INPUT_POST, 'consumpsum');
    $consumpavg = filter_input(INPUT_POST, 'consumpavg');

    $sql = "SELECT bill_hist.kid, billable_serv_id, service_addr, type, rate_code, bill_date,";
    // $sql = "SELECT bill_hist_main.kid, billable_serv_id, service_addr, type, rate_code, bill_date, ";

    if($consumpsum != null or $consumpavg != null){
        if ($consumpsum != null and $consumpavg != null){
            $sql .= "SUM(bill_hist_main.consump) AS consumpsum, AVG(bill_hist_main.consump) AS consumpavg";
        }
        else if ($consumpsum != null){
            $sql .= "SUM(bill_hist_main.consump) AS consumpsum";
        }
        else if ($consumpavg != null){
            $sql .= "AVG(bill_hist_main.consump) AS consumpavg";
        }        

    }
    else{
        $sql .= " consump";
    }

    // $sql .=", geometry FROM bill_hist_main INNER JOIN polygon_data_main ON bill_hist_main.kid = polygon_data_main.kid ";
    $sql .=", geometry FROM bill_hist INNER JOIN polygon_data_main ON bill_hist.kid = polygon_data_main.kid ";


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
           $sql .= "bill_date BETWEEN '".$from_date."' AND '".$to_date."'";
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
           if ($COperation == "Equal"){
                $sql .= "consump = " . $consump;
                $count += 1;
           }
           if ($COperation == "Greater"){
                $sql .= "consump > " . $consump;
                $count += 1;
           }           
           if ($COperation == "Less"){
                $sql .= "consump < " . $consump;
                $count += 1;
           }           



       }
   }
    if($consumpsum != null or $consumpavg != null){
        $sql .= " GROUP BY kid, billable_serv_id";
    }

    // $sql .= " GROUP BY kid, billable_serv_id";

    // double check the sql statement
    echo $sql."</br>";


$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        if ($result = mysqli_query($mysqli, $sql)) {
        // Fetch one and one row

          while ($row = mysqli_fetch_row($result)) {
              printf("<h1>%s %s %s %s %s %s %s %s </h1></br>", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], htmlentities($row[7], ENT_XHTML));
              // echo htmlentities($row[7], ENT_XHTML); //This is used to keep the XML tags around the geometry column
              echo "</br>";
         }
        // Free result set
        mysqli_free_result($result);
    }
#### 
#NOTICE IMPORTANT!!!!
#QUERY IS CORRECT. HOW TO RETRIEVE OUTPUT IS FLAWED. TAKES ABOUT 15 MINUTES FOR A CONCISE QUERY


#--------------------------------------------------------------------------
# KEEP THIS CODE HERE BECAUSE ITS FOR CREATING CSV FILE OFF OF QUERY OUTPUT 
#--------------------------------------------------------------------------

##$result IS EMPTIED BY THE PRINT ON THE SCREEN STATEMENT
// $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

// $myfile = fopen("outfile.csv", "w") or die('Unable to open file');

//     if($consumpsum != null or $consumpavg != null){
//         if ($consumpsum != null and $consumpavg != null){
//             $txt = "kid,billable_serv_id,service_addr,type,rate_code,bill_date,consumpsum,consumpavg";
//             fwrite($myfile, $txt);
//             if ($result->num_rows > 0) {
//                 while ($row = $result->fetch_assoc()) {
//                     fwrite($myfile, "\n" . $row["kid"] . "," . $row["billable_serv_id"] . "," . $row["service_addr"] . " KELOWNA," . $row["type"] . "," . $row["rate_code"] . "," . $row["bill_date"] . "," . $row["consumpsum"] . ",".$row["consumpavg"]."");
//                 }
//             } else {
//                 echo "0 results";
//             }     

//         }
//         else if ($consumpsum != null){
//             $txt = "kid,billable_serv_id,service_addr,type,rate_code,bill_date,consumpsum";
//             fwrite($myfile, $txt);
//             if ($result->num_rows > 0) {
//                 while ($row = $result->fetch_assoc()) {
//                     fwrite($myfile, "\n" . $row["kid"] . "," . $row["billable_serv_id"] . "," . $row["service_addr"] . " KELOWNA," . $row["type"] . "," . $row["rate_code"] . "," . $row["bill_date"] . "," . $row["consumpsum"] . "");
//                 }
//             } else {
//                 echo "0 results";
//             }
//         }
//         else if ($consumpavg != null){
//             $txt = "kid,billable_serv_id,service_addr,type,rate_code,bill_date,consumpavg";
//             fwrite($myfile, $txt);
//             if ($result->num_rows > 0) {
//                 while ($row = $result->fetch_assoc()) {
//                     fwrite($myfile, "\n" . $row["kid"] . "," . $row["billable_serv_id"] . "," . $row["service_addr"] . " KELOWNA," . $row["type"] . "," . $row["rate_code"] . "," . $row["bill_date"] . "," . $row["consumpavg"] . "");
//                 }
//             } else {
//                 echo "0 results";
//             }
//         }
//     }
//     else{
//         $txt = "kid,billable_serv_id,service_addr,type,rate_code,bill_date,consump, geometry";
//         fwrite($myfile, $txt);
//             if ($result->num_rows > 0) {
//                 while ($row = $result->fetch_assoc()) {
//                     fwrite($myfile, "\n" . $row["kid"] . "," . $row["billable_serv_id"] . "," . $row["service_addr"] . " KELOWNA," . $row["type"] . "," . $row["rate_code"] . "," . $row["bill_date"] . "," . $row["consump"] . ",\"" . $row["geometry"] . "\"");
//                 }
//             } else {
//                 echo "0 results";
//             }
//     }










// $txt = "kid,billable_serv_id,service_addr,type,rate_code,bill_date,consump";
// fwrite($myfile, $txt);
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//     // while ($row = mysqli_fetch_row($result)){    
//         fwrite($myfile, "\n" . $row["kid"] . "," . $row["billable_serv_id"] . "," . $row["service_addr"] . "," . $row["type"] . "," . $row["rate_code"] . "," . $row["bill_date"] . "," . $row["consump"] . "");
//     }
// } else {
//     echo "0 results";
// }

// fclose($myfile);





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