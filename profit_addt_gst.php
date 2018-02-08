<?php

include_once 'dbconnect.php';

$table_name = "profit_and_gst";

$invoice_no = $_POST['invoice_no'];
$profit = $_POST['profit'];
$additional_cost = $_POST['additional_gst'];


$query = "INSERT INTO $table_name VALUES($invoice_no,$profit,$additional_cost)";

if(mysql_query($query)){
    echo "<hr><center><h1>INVENTORY SUCCESSFULLY UPDATED</h1></center>";
}
else{
    echo "Error in Query Execution.".mysql_error();
    exit();
}

$display_query = "SELECT final_selling_price,profit_amt,addt_gst_amt,net_add_amt,landing_amt,gst_amt,cost_inc_gst,total_after_gst,transport_amt,delivery_amt,wastage_amt,financial_amt,overhead_amt FROM gst_amount ga,add_amount aa,profit_add_gst pg,net_landing nl,selling_price sp WHERE ga.invoice_no = $invoice_no and aa.invoice_no = $invoice_no and pg.invoice_no = $invoice_no and nl.invoice_no = $invoice_no and sp.invoice_no = $invoice_no";
?>


<br><br><br><hr><br><br>
<table border=1>
    <tr>
        <th>GST AMOUNT</th>
        <th>COST INCL. GST</th>
        <th>TOTAL AFTER GST</th>
        <th>TRANSPORT COST</th>
        <th>DELIVERY COST</th>
        <th>WASTAGE COST</th>
        <th>FINANCIAL COST</th>
        <th>OVERHEAD COST</th>
        <th bgcolor='#4A992C'>PROFIT AMOUNT</th>
        <th>ADDITIONAL GST AMOUNT</th>
        <th bgcolor='#4A992C'>FINAL SELLING PRICE</th>
    </tr>

<?php
$result=mysql_query($display_query);

if(!$result){
    echo "Query error".mysql_error();
}
else{
    
    while($row=mysql_fetch_array($result)){
        echo "<tr align='center'>";
        echo "<td>".round($row['gst_amt'],2)."</td>";
        echo "<td>".round($row['cost_inc_gst'],2)."</td>";
        echo "<td>".round($row['total_after_gst'],2)."</td>";
        echo "<td>".round($row['transport_amt'],2)."</td>";
        echo "<td>".round($row['delivery_amt'],2)."</td>";
        echo "<td>".round($row['wastage_amt'],2)."</td>";
        echo "<td>".round($row['financial_amt'],2)."</td>";
        echo "<td>".round($row['overhead_amt'],2)."</td>";
        echo "<td bgcolor='#4A992C'>".round($row['profit_amt'],2)."</td>";
        echo "<td>".round($row['addt_gst_amt'],2)."</td>";
        echo "<td bgcolor='#4A992C'>".round($row['final_selling_price'],2)."</td>";
        echo "</tr>";
    }
}
?>
</table>


