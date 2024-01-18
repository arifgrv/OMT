<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 10px;
            padding: 0;
            background-color: #f8f9fa; /* Light gray background color */
        }

        .invoice {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            border: 1px solid #000;
            padding: 20px;
            background-color: #fff; /* White background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
        }

        .header {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
            text-decoration: underline;
            color: #007bff; /* Blue header color */
        }

        .item {
            margin-bottom: 15px;
            text-align: left;
            color: #333; /* Dark text color */
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #6c757d; /* Gray footer text color */
        }

        .center {
            text-align: center;
        }

        h2 {
            color: #007bff; /* Blue heading color */
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dee2e6; /* Light gray border color */
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #007bff; /* Blue header background color */
            color: #fff; /* White header text color */
        }

        hr {
            border-top: 2px solid #007bff; /* Blue horizontal rule color */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .total-amount {
            font-weight: bold;
            color: #28a745; /* Green total amount color */
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
            echo $formattedDate;
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
                    <th>Unit Price</th>
                </tr>
                <?php $totalAmount = 0; foreach ($invoice_record as $key => $value) { ?>
                    <tr>
                        <td><?php echo ($key + 1); ?></td>
                        <td><?php echo $value->seat_number; ?></td>
                        <td><?php echo $value->price; ?></td>
                    </tr>
                    <?php $totalAmount += $value->price; }; ?>
            </table>
            <hr>
        </div>
        <div class="item total-amount">
            <div class="left"><b>Total Amount: BDT <?php echo $totalAmount; ?> Tk.</b></div>
            <div class="left">[with Includes all ADM + ACM + VAT + Movie Tax + Hall Tax]</div>
        </div>
        <hr>
        <div class="footer">Thank you for choosing GRV Cineplex! Enjoy the show!</div>
    </div>
</body>

</html>
