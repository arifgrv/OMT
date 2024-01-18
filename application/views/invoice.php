<?php 
echo "<pre>";
print_r($invoice_record);
echo "</pre>";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 10px;
            padding: 0;
        }

        .invoice {
            width: 300px;
            margin: 0 auto;
            text-align: center;
            border: 1px solid #000;
            padding: 10px;
        }

        .header {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .item {
            margin-bottom: 5px;
            text-align: left;
        }

        .footer {
            margin-top: 10px;
            text-align: center;
        }

        .center {
            text-align: center;
        }
    </style>
    <title>GRV Cineplex Invoice</title>
</head>

<body>

    <div class="invoice">
        <div class="header">GRV Cineplex</div>
        <p>BIN: 004214822-1101 And Mushak 6.3 <br/>232, Kazihata Rajshahi, Bangladesh.</p>
        <div class="item"><b>Invoice Number: <?php echo $invoice_record[0]->invoice_number; ?></b></div>
        <div class="item">Booking Date: <?php 
                $timestamp = strtotime($invoice_record[0]->currentdate);
                $formattedDate = date('d-m-Y', $timestamp);
                echo  $formattedDate;
         ?></div>
        <hr>
        <h2>MOVIE TICKET</h2>
        <hr>
        <div class="item">
            <table>
                <tr>
                    <td>Customer Name:</td>
                    <td><?php echo $invoice_record[0]->customer_name; ?></td>
                </tr>
                <tr>
                    <td>Customer Mobile:</td>
                    <td><?php echo $invoice_record[0]->customer_mobile; ?></td>
                </tr>
                <tr>
                    <td>Show Information:</td>
                    <td><?php echo $invoice_record[0]->reserve_date.' - '.$invoice_record[0]->movie_name.' - '.$invoice_record[0]->show_time; ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="item">
            <div class="center"><b>Seat Number(s):</b></div>
            <div class="center">
                <?php 
                    $seatNumbersArray = array();
                    foreach ($invoice_record as $record) {
                        $seatNumbersArray[] = $record->seat_number;
                    }
                   echo implode(', ', $seatNumbersArray);
                ?> 
            </div>
            <hr>
        </div>
        <div class="item">
            <div class="Left">Unit Price: <?php echo $unitPrice; ?></div>
            <div class="Left">Total Seats: <?php echo $totalSeats; ?></div>
            <div class="Left">Sub Total: <?php echo $sub_total; ?></div>
            <div class="Left">[with Includes all ADM + ACM + VAT + Movie Tax + Hall Tax]</div>
            <div class="Left"><b>Grand Total: <?php echo number_format($sub_total,2); ?></b></div>
        </div>
        <hr>
        <div class="footer">Thank you for choosing GRV Cineplex! Enjoy the show!</div>
    </div>

</body>

</html>
