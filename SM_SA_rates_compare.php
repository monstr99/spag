<?php

ini_set('max_execution_time', 300);

# commands to run Python Script and update the json file.
include_once "update_SM_rates.php";

$SM_json_data = file_get_contents("json\\SM_todays_rate.json");
$SM_array = json_decode($SM_json_data, true);

$SA_json_data = file_get_contents("json\\our_rates.json");
$SA_array = json_decode($SA_json_data, true);

echo "<center><h2><u> PRICE COMPARISON </u></h2></center><hr><br>";
echo "<table border='1' width='920px' align='center'>";
echo "<tr>";
echo "<th>ITEM</th>";
echo "<th>WEIGHT</th>";
echo "<th>SPICE MARKET</th>";
echo "<th>SPICE ANGADI</th>";
echo "</tr>";


$array_keys = array_keys($SM_array);
sort($array_keys);

foreach ($array_keys as $mkey){

    $weight_keys = array_keys($SM_array[$mkey]);
    sort($weight_keys);

    foreach ($weight_keys as $wkey){

    # SPICE ANGADI rates lower than SPICE MARKET..............

    if ($SA_array[$mkey][$wkey] < $SM_array[$mkey][$wkey]){
        echo "<tr align='center' bgcolor='#15a331'><td>".strtoupper($mkey)."</td>";

        if($wkey == "1KG"){
            echo "<td>".$wkey."</td>";
        }else{
            echo "<td>".$wkey."  gms</td>";
        }

        echo "<td bgcolor='#15a331'>".$SM_array[$mkey][$wkey]."</td>";
        echo "<td bgcolor='#15a331'><span style='color:'>".$SA_array[$mkey][$wkey]."</span></td></tr>";
    }

    # SPICE ANGADI rates are higher than SPICE MARKET.............

    else if($SA_array[$mkey][$wkey] > $SM_array[$mkey][$wkey]){
        echo "<tr align='center' bgcolor='#d62626'><td><font color='white'>".strtoupper($mkey)."</font></td>";

        if($wkey == "1KG"){
            echo "<td><font color='white'>".$wkey."</font></td>";
        }else{
            echo "<td><font color='white'>".$wkey."  gms</font></td>";
        }
        
        echo "<td><font color='white'>".$SM_array[$mkey][$wkey]."</font></td>";
        echo "<td><span style='color:white'>".$SA_array[$mkey][$wkey]."</span></td></tr>";
    }

    # SPICE ANGADI and SPICE MARKET have same rates for the item.............

    else{
        echo "<tr align='center' bgcolor='#6875a3'><td><font color='white'>".strtoupper($mkey)."</font></td>";

        if($wkey == "1KG"){
            echo "<td><font color='white'>".$wkey."</font></td>";
        }else{
            echo "<td><font color='white'>".$wkey."  gms</font></td>";
        }

        echo "<td><font color='white'>".$SM_array[$mkey][$wkey]."</font></td>";
        echo "<td><font color='white'>".$SA_array[$mkey][$wkey]."</font></td></tr>";
    }
    
    
    #break;
    }
}


?>

</table>
