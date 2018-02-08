<html>
    <head>
        <title>
            Additional Charges Entry
        </title>

    </head>

    <body>
        <br>
        <center><h1><u><pre>Additional Charges Entry</pre></u></h1></center>
        <hr>

        <form action="additional_charges.php" method="post">
        <table align="center">

            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>

            <tr align="center">
                <td align="left"><pre><b>INVOICE NUMBER : </b></pre></td>
                <?php
                session_start();
                $invoice_no = $_SESSION['invoice_no'];
                echo "<td><input type='text' value=$invoice_no name='invoice_no' readonly></td>";
            ?>
            </tr>

            <tr align="center">
                <td align="left"><pre><b>TRANSPORT COST : </b></pre></td>
                <td><input type="textbox" name="transport_cost" placeholder="Between 0.0 to 1.0"></td>
            </tr> 

            <tr align="center">
                <td align="left"><pre><b>DELIVERY COST : </b></pre></td>
                <td><input type="textbox" name="delivery_cost" placeholder="Between 0.0 to 1.0"></td>
            </tr> 

            <tr align="center">
                <td align="left"><pre><b>WASTAGE COST : </b></pre></td>
                <td><input type="textbox" name="wastage_cost" placeholder="Between 0.0 to 1.0"></td>
            </tr> 

            <tr align="center">
                <td align="left"><pre><b>FINANCIAL COST : </b></pre></td>
                <td><input type="textbox" name="financial_cost" placeholder="Between 0.0 to 1.0"></td>
            </tr> 

            <tr align="center">
                <td align="left"><pre><b>OVERHEADS : </b></pre></td>
                <td><input type="textbox" name="overheads" placeholder="Between 0.0 to 1.0"></td>
            </tr> 



        </table>


        <hr><center><input type="submit" value="SUBMIT DATA"></center>

        </form>
    </body>
</html>