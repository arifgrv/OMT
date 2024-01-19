<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Day wise Accounts Report</title>
</head>

<body>

    <?php  date_default_timezone_set('Asia/Dhaka');

        // Get the current date in the format 'Y-m-d'
        $current_date = date('Y-m-d');
     ?>
    <div class="container mt-5">
        <div style=" text-align: center;">
            <img src="<?php echo base_url('grv-transprent-logo.png'); ?>" width="100" height="100">
            <h3>Day wise Accounts Report : <?php echo $current_date; ?> (y-m-d)</h3>
        </div>
        <div class="row mt-5 mb-5 bg-light">

            <form action="<?php echo base_url("index.php/accounts") ;?>" method="POST">
                <div class="col-md-12">
                    From:
                    <input class="form-control" type="date" name="Date_From">
                    To:
                    <input class="form-control" type="date" name="Date_TO">  
                    <button type="submit" class="btn btn-primary">Search</button>  
                </div>
            </form>
        </div>
        <table id="salesTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Show Information</th>
                    <th>Seat Numbers</th>
                    <th>Ticket Price</th>
                    <th>Total Seats</th>
                    <th>Sub Total</th>
                    
                </tr>
            </thead>
            <tbody>

            <?php $TT=0;$ticket=0; ?> 
            <?php foreach ($result as $key => $row) {?>
                <tr>
                    <td><?php echo ($key+1) ?></td>
                    <td><?php echo $row['invoice_number']; ?></td>
                    <td><?php echo $row['reserve_date']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['customer_mobile']; ?></td>
                    <td><?php echo $row['Show_Information']; ?></td>
                    <td><?php echo $row['seat_number']; ?></td>
                    <td><?php echo $row['Ticket_Price']; ?></td>
                    <td><?php echo $row['Total_Seats']; ?></td>
                    <td><?php echo $row['Sub_Total']; ?></td>
                </tr>
              <?php  
              $TT=($TT+$row['Sub_Total']); 
              $ticket=$ticket+$row['Total_Seats'];

            }; ?>
             
                <!-- Sales data will be dynamically loaded here -->
                <tr>
                    <td colspan="9"> <b>Total Sales : <?php echo $ticket ;?></b></td>
                </tr>
                <tr>
                    <td colspan="9"> <b>Grand Total : <?php echo $TT ;?></b></td>
                </tr>
            </tbody>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   

</body>

</html>
