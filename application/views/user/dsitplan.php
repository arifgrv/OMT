<?php include 'head.php';?>

<body>

<?php include 'header.php';?>

<?php include 'sidebar.php';?>

  <main id="main" class="main">

    <?php include 'submain/pagetitle.php';?>
    <form action="<?php echo base_url("index.php/UserDiscountMakeResurve"); ?>" method="POST">
        <section class="section dashboard">
          <div class="row">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">
                                <h1>Welcome to GRV Cineplex! </h1>
                                <img class="rounded-image" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="100" height="100">
                                <h4 class="mb-0">Customer Information</h4>
                            </div>
                                <div class="card-body">                            
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->session->userdata('user_name') ;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number:</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" pattern="[0-9]{11}" value="<?php echo $this->session->userdata('user_mobile') ;?>" required>
                                        <small class="form-text text-muted">Please enter a 11-digit mobile number.</small>
                                    </div>
                                    <?php echo form_hidden('show_name', $Movie_Name['MovieName']); ?>
                                    <?php echo form_hidden('show_date', $Show_date); ?>
                                    <?php echo form_hidden('show_time', $show_time['ShowTime']); ?>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-success">Select Your Sit(s)</h3>
                            <i class="fa-solid fa-chair text-danger"> - Sold Out</i>
                            &emsp;
                            <i class="fa-solid fa-chair text-primary"> - Available</i>
                        </div>
                        <div class="card-body">
                            <!-- Seat Selection -->
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- VIP Galary 1 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            VIP Lounge: BDT-700Tk.
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '8', 'VIP'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-center" style="margin: 20px auto; min-height: 100px;">Projection Room</div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <!-- VIP Galary 2 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            VIP Lounge: BDT-700Tk.
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '9', '15', 'VIP'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Business Galary -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    Business Galary: BDT-400Tk.
                                                </div>
                                                <div class="card-body">
                                                    <!-- A -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '4', 'A'); ?>
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '10', '13', 'A'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- B -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'B'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- C -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'C'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- D -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'D'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- E -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'E'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- F -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'F'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- G -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'G'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- H -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'H'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- I -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'I'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Economy Galary -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    Economi: BDT-350Tk.
                                                </div>
                                                <div class="card-body">
                                                    <!-- J -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'J'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Seat Selection -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">Digital Payment:</div>
                        <div class="row  mt-5 mb-3">
                            <div class="col-md-6">
                                <img src="<?php echo base_url('Assets/BkashPayment.jpeg') ;?> " width="400px" height="400px">
                                <p style="margin-left: 20px;">bKash Number: <a href="#" class="copyLink" onclick="copyLinkedText(event)">01877766966</a></p>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-right:3px;">
                                    <p  style="text-align: justify;">Dear valued customer,<br/>  We appreciate your continued support and loyalty to our services. We're thrilled to guide you on how to calculate the value of your voucher:</p>
                                    <u>For Percentage Voucher</u>
                                    <p><b>Paid Amount=Total Amount−(Total Amount×Discount Percentage/100)</b></p>
                                    <u>For Cash Voucher</u>
                                    <p><b>Paid Amount=Total Amount−Discount Cash Amount</b></p>
                                    <hr>
                                    <b><h3 class="text-success" id="total_cost_show"></h3></b>
                                    <input type="hidden" name="totalbill" id="total_cost">
                                    <hr>
                                    <div class="col-md-12 mb-3">
                                        <label for="receivedAmount"><b>Paid Amount</b> as calculated by above formula:</label>
                                            <input type="text" class="form-control" name="discount_amount" id="discount_amount" placeholder="Paid Amount" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="discountVoucherCode">Voucher Code:</label>
                                        <input type="text" class="form-control" name="discount_ref" id="discount_ref" placeholder="Voucher Code" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="transID">bKash Trans ID:</label>
                                            <input type="text" class="form-control" name="transID"  id="transID" placeholder="Enter Trans ID" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success mt-3 btn-lg">Reserve</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
    </form>

<script>
    // Function to calculate total cost
    function calculateTotal() {
        // Define ticket prices
        var vipPrice = 700;
        var aPrice = 350;
        var generalPrice = 400;

        // Get the number of selected seats
        var selectedSeats = document.querySelectorAll('input[name="seatcheckbox[]"]:checked').length;

        // Calculate total cost based on the selected seats
        var totalCost = 0;

        document.querySelectorAll('input[name="seatcheckbox[]"]:checked').forEach(function (checkbox) {
            var sitNumber = checkbox.id.toUpperCase(); // Convert to uppercase for case-insensitive comparison
            if (sitNumber.includes('VIP')) {
                totalCost += vipPrice;
            } else if (sitNumber.includes('J')) {
                totalCost += aPrice;
            } else {
                totalCost += generalPrice;
            }
        });

        // Display the total cost
        document.getElementById('total_cost_show').innerText = 'Total Amount : BTD - ' + totalCost + 'Tk.';
         document.getElementById('total_cost').value = totalCost;
    }

    // Attach the calculateTotal function to the change event of seat checkboxes
    var seatCheckboxes = document.querySelectorAll('input[name="seatcheckbox[]"]');
    seatCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', calculateTotal);
    });

    // Calculate total cost once on page load
    calculateTotal();
</script>
<script>
    function copyLinkedText(event) {
        // Prevent the default link behavior (navigation)
        event.preventDefault();

        // Get the linked text
        const linkedText = event.target.innerText;

        // Create a temporary textarea element
        const tempTextarea = document.createElement('textarea');

        // Set the value of the textarea to the linked text
        tempTextarea.value = linkedText;

        // Append the textarea to the document
        document.body.appendChild(tempTextarea);

        // Select the text in the textarea
        tempTextarea.select();
        tempTextarea.setSelectionRange(0, 99999); // For mobile devices

        // Execute the copy command
        document.execCommand('copy');

        // Remove the textarea from the document
        document.body.removeChild(tempTextarea);

        // Display a message or perform any other action
        //alert('Text copied to clipboard: ' + linkedText);
    }
</script>

  </main><!-- End #main -->

<?php include 'footer.php';?>  