<?php

#$command = "C:\\Python27\\python.exe C:\\Users\\rapidx99\\PycharmProjects\\course\\price-of-chair\\src\\app.py";
#exec("powershell -command $command");

$jsonData = file_get_contents("json\\SMtodays_rate.json");
$SMarray = json_decode($jsonData, true);

# to decode json data as a PHP Object.
#$obj = json_decode($jsonData);



echo "<h3>Turmeric Powder</h3><br>";

echo "<b><u>100 Grams:</b></u> <i>Rs.".$SMarray['turmeric_powder'][100]."</i>";
echo "<br>";



# to read from json file using PHP object.
#echo $obj->{'turmeric_powder'}->{'100'};

?>