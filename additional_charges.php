<?php

include_once 'dbconnect.php';

$table_name = "additional_charges";

$invoice_no = $_POST['invoice_no'];
$transport_cost = $_POST['transport_cost'];
$delivery_cost = $_POST['delivery_cost'];
$wastage_cost = $_POST['wastage_cost'];
$financial_cost = $_POST['financial_cost'];
$overheads = $_POST['overheads'];

session_start();
$_SESSION['invoice_no'] = $invoice_no;

$query = "INSERT INTO $table_name VALUES($invoice_no,$transport_cost,$delivery_cost,$wastage_cost,$financial_cost,$overheads)";

if(mysql_query($query)){
    echo "<center><hr><h2><pre>Record Successfully Inserted.</pre></h2><hr></center>";


    echo "<br><br><center><h3><pre>Add Profit Margin</pre></h3></center>";
    echo "<form action='profit_addt_gst_entry.php' method='post'>";
    echo "<br><center><input type='submit' value='PROCEED'></center></form>";
    

}
else{
    echo "Error in Query Execution.".mysql_error();
    exit();
}

exit();


?>