<html>
    <head>
        <title>
            Profit and Additional GST Entry
        </title>

    </head>

    <body>
        <br>
        <center><h1><u><pre>Profit and Additional GST Entry</pre></u></h1></center>
        <hr>

        <form action="profit_addt_gst.php" method="post">
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
                <td align="left"><pre><b>PROFIT : </b></pre></td>
                <td><input type="textbox" name="profit" placeholder="Between 0.0 to 1.0"></td>
            </tr> 

            <tr align="center">
                <td align="left"><pre><b>ADDITIONAL GST : </b></pre></td>
                <td><input type="textbox" name="additional_gst" placeholder="Between 0.0 to 1.0"></td>
            </tr> 


        </table>


        <hr><center><input type="submit" value="SUBMIT DATA"></center>

        </form>
    </body>
</html>