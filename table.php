<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Waterlog.css">
</head>
<body>
<div align="center" class="table">
<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr>
            <th>Kid</th>
            <th>Bid</th>
            <th>Address</th>
            <th>Type</th>
            <th>Rate Code</th>
            <th>Date</th>
            <th>Consumption</th>
        ";

class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }

     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() { 
         echo "<tr>"; 
     } 

     function endChildren() { 
         echo "</tr>" . "\n";
     } 
} 

    $servername = "cosc304.ok.ubc.ca";
    $username = "btruong";
    $password = "btruong";
    $dbname = "db_btruong";

    /*$servername = "localhost";
    $username = "user";
    $password = "password";
    $dbname = "myDataSet"*/

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("
        SELECT * FROM bill_hist
        "); 
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

/*


// Fetch Record from Database
$output = "";
$table = "bill_hist"; // Enter Your Table Name 
$sql = mysql_query("select * from $table");
$columns_total = mysql_num_fields($sql);

// Get The Field Name
for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename = "myFile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

*/
?>  

</div>

</body>
</html>