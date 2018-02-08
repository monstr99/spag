<?php

include_once 'dbconnect.php';

$invoice_no = $_SESSION['invoice_no'];

$item_batch_value_row = mysql_query("SELECT batch_value FROM item_code,purchase_details WHERE item_code.hsn = purchase_details.hsn");
$item_bv = mysql_fetch_array($item_batch_value_row);
$item_batch_value = $item_bv['batch_value'];

$city_batch_value_row = mysql_query("SELECT city_code.batchvalue FROM city_code,purchase_details,supplier WHERE purchase_details.supplier=supplier.supplier_name and city_code.city = supplier.city");
$city_bv = mysql_fetch_array($city_batch_value_row);
$city_batch_value = $city_bv['batchvalue'];

$supplier_batch_value_row = mysql_query("SELECT batch_value FROM purchase_details,supplier WHERE purchase_details.supplier=supplier.supplier_name");
$supplier_bv = mysql_fetch_array($supplier_batch_value_row);
$supplier_batch_value = $supplier_bv['batch_value'];

$datebf = mysql_query("SELECT date FROM purchase_details WHERE purchase_details.invoice_no = $invoice_no");
$date_b_v = mysql_fetch_array($datebf);
$date_bv = $date_b_v['date'];
$date = str_replace("-","",$date_bv);

$quantity_bv = mysql_fetch_array(mysql_query("SELECT quantity FROM purchase_details WHERE purchase_details.invoice_no = $invoice_no"));
$quantity = $quantity_bv['quantity'];

$batchcode = sprintf("%02d-%s-%s-%s-%03d",$item_batch_value,$city_batch_value,$supplier_batch_value,$date,$quantity);

$query = "INSERT INTO batch_code VALUES($invoice_no,'$batchcode')";
if(!mysql_query($query)){
    echo "Error entering value into BATCH_CODE table".mysql_error();
    exit();
}


?>