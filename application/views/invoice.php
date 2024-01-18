<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Home Page</title>
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
            <div class="center"><u><b>Customer Information:</b></u></div>
        </div>
        <div class="item">
            <table class="table">
                <tr>
                    <td>Customer Name:</td>
                    <td><?php echo $invoice_record[0]->customer_name; ?></td>
                </tr>
                <tr>
                    <td>Customer Mobile:</td>
                    <td><?php echo $invoice_record[0]->customer_mobile; ?></td>
                </tr>
                <tr>
                    <td>Reservation Info:</td>
                    <td><?php echo $invoice_record[0]->reserve_date.' - '.$invoice_record[0]->movie_name.' - '.$invoice_record[0]->show_time; ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="item">
            <div class="center"><b>Details:</b></div>
            <table class="table">
                <tr>
                    <th>SL#</th>
                    <th>Sit Number</th>
                    <th>Unite Price</th>
                </tr>
                <?php $t=0;foreach ($invoice_record as $key => $value) {?>  
                <tr>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $value->seat_number; ?></td>
                    <td><?php echo $value->price; ?></td>
                </tr>

                <?php $t=($t+$value->price); }; ?>
            </table>
            <hr>
        </div>
        <div class="item">
            <div class="Left"><b>Total Amount: <?php echo 'BDT '.$t. 'Tk.'; ?></b></div>
            <div class="Left">[with Includes all ADM + ACM + VAT + Movie Tax + Hall Tax]</div>
        </div>
        <hr>
        <div class="footer">Thank you for choosing GRV Cineplex! Enjoy the show!</div>
    </div>

</body>

</html>
