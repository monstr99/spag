<?php

include_once 'dbconnect.php';

$table_name = "purchase_details";

$invoice_no = $_POST['invoice_no'];
$hsn = $_POST['hsn'];
$date = $_POST['date'];
$suplier = $_POST['supplier'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
#echo $invoice_no,$hsn,$date,$suplier,$quantity,$unit_price;

session_start();
$_SESSION['invoice_no'] = $invoice_no;

$query = "INSERT INTO $table_name VALUES($invoice_no,'$hsn','$date','$suplier',$quantity,$unit_price)";

if(mysql_query($query)){
    echo "<center><hr><h2><pre>Record Successfully Inserted.</pre></h2><hr></center>";
    echo "<br><br>";
    include_once 'batchcode.php';
    echo "<center><h2 style='color:GREEN'>BATCH CODE: ".$batchcode."</h2></center><br><hr>";

    echo "<br><br><center><h3><pre>Add Additional Charges and Profit Margin</pre></h3></center>";
    echo "<form action='additional_charges_entry.php' method='post'>";
    echo "<br><center><input type='submit' value='YES, PROCEED'></center></form>";
    echo "<hr><center><b><pre><a href='skip_addt_details.php'>SKIP (DEFAULT VALUES)</a></pre></b>.";

}
else{
    echo "Error in Query Execution.".mysql_error();
    exit();
}

exit();

?>