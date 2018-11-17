<?php
session_start();
include 'dbp.php';

$result = mysqli_query($conn,"SHOW COLUMNS FROM coachlocation");

if ($numberOfRows > 0) {

$values = mysqli_query($dbc, "SELECT * FROM customer WHERE coachid='202'");

while ($rowr = mysqli_fetch_row($values)) {
    for ($j=0;$j<$numberOfRows;$j++) {

        $csv_output .= $rowr[$j].", ";
    }
    $csv_output .= "\n";
}

}
print $csv_output;
exit;
?>