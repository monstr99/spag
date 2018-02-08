<html>
    <head>
        <title>
            Product Purchase Entry
        </title>
    </head>

    <body>
        <br>
        <center><h1><u><pre>Product Purchase Entry</pre></u></h1></center>
        <hr>

        <form action="purchase_details.php" method="post">
        <table align="center">

            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>

            <tr align="center">
                <td align="left"><pre><b>INVOICE NUMBER : </b></pre></td>
                <td><input type="textbox" name="invoice_no" placeholder="upto 12 digits"></td>
            </tr>

            <tr align="center">
                <td align="left"><pre><b>HSN/SAC : </b></pre></td>
                <td><select name="hsn" size="1">
                <?php

                    #require("dbconnect.php");
                    include_once 'dbconnect.php';
                    $query = "SELECT hsn FROM hsn";
                    $result = mysql_query($query);

                    while($row=mysql_fetch_array($result)){
                        echo "<option value='".$row['hsn']."'>".$row['hsn']."</option>";
                    }
                ?>
            </tr>

            <tr align="center">
                <td align="left"><pre><b>DATE : </b></pre></td>
                <td><input type="textbox" name="date" placeholder="31-12-2018"></td>
            </tr> 

            <tr align="center">
                <td align="left"><pre><b>SUPPLIER : </b></pre></td>
                <td><select name="supplier" size="1">
                <?php

                    #require("dbconnect.php");
                    include_once 'dbconnect.php';
                    $query = "SELECT supplier_name FROM supplier";
                    $result = mysql_query($query);

                    while($row=mysql_fetch_array($result)){
                        echo "<option value='".$row['supplier_name']."'>".$row['supplier_name']."</option>";
                    }
                ?>
            </tr>

            <tr align="center">
                <td align="left"><pre><b>QUANTITY : </b></pre></td>
                <td><input type="textbox" name="quantity"></td>
            </tr>

            <tr align="center">
                <td align="left"><pre><b>UNIT PRICE : </b></pre></td>
                <td><input type="textbox" name="unit_price"></td>
            </tr>

        </table>

        <hr><center><input type="submit" value="SUBMIT DATA"></center>

        </form>
    </body>
</html>