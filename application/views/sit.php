<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <title>Home Page</title>
    <style>
        body {
            background-color: #231F20; /* Black */
            color: #BB9642; /* Golden */
        }

        .rounded-image {
            width: 150px;
            height: 150px;
            border: 5px solid #231F20; /* Black */
            border-radius: 50%;
            overflow: hidden;
            background-color:white ;
        }
    </style>
</head>
<body>
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
                        <form action="<?php echo base_url("index.php/print") ;?>" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" pattern="[0-9]{11}" required>
                                <small class="form-text text-muted">Please enter a 11-digit mobile number.</small>
                            </div>
                            <?php echo form_hidden('show_name', $Movie_Name['MovieName']); ?>
                            <?php echo form_hidden('show_date', $Show_date); ?>
                            <?php echo form_hidden('show_time', $show_time['ShowTime']); ?>
                            <div class="form-group">
                                <label for="unite_price">Ticket Price</label>
                                <select class="form-control" id="unite_price" name="unite_price" required>
                                        <option value="1">Economy-350</option>                                    
                                        <option value="2">Business-400</option>                                    
                                        <option value="3">VIP Lounge-700</option>                                    
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-success">Select Your Sit(s)</h3>
                        <i class="fa-solid fa-chair text-danger"> - Sold Out</i> 
                        <br/> 
                        <i class="fa-solid fa-chair text-primary"> - Available</i>
                    </div>
                    <div class="card-body">
                        <!-- Seat Selection -->
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    VIP Galary 1:
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 7; $i++) { 
                                                            $sitNumbers = 'VIP' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>                                                      
                                                </div>
                                            </div>
                                        </div>                             
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    VIP Galary 2:
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 8; $i <= 15; $i++) { 
                                                            $sitNumbers = 'VIP' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>                                                      
                                                </div>
                                            </div>
                                        </div>                             
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    General Galary:
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 4; $i++) { 
                                                            $sitNumbers = 'A' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>
                                                        <?php } ;?>                                                     
                                                        <?php 
                                                        for ($i = 10; $i <= 13; $i++) { 
                                                            $sitNumbers = 'A' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>
                                                        <?php } ;?>
                                                    </div>  
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'B' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'C' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>  
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'D' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>  
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'E' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'F' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'G' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'H' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>  
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'I' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>

                                                        <?php } ;?>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <?php 
                                                        for ($i = 1; $i <= 13; $i++) { 
                                                            $sitNumbers = 'J' . $i;
                                                            $reservesit = $this->Login_model->checkReservations($sitNumbers, $Show_date, $show_time['ShowTime'], $Movie_Name['MovieName']);
                                                        ?>
                                                            <div class="col">
                                                               <?php   if (!empty($reservesit)) {?>
                                                                    <p class="card-text text-danger">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php  echo $sitNumbers ;?>" value="<?php echo $sitNumbers;?>" disabled>
                                                                        <i class="fa-solid fa-chair"></i><?php echo $sitNumbers ; ?>
                                                                    </p>

                                                             <?php   }else{ ?>
                                                                     <p class="card-text text-primary">
                                                                        <input type="checkbox" name="seatcheckbox[]" id="<?php echo $sitNumbers; ?>" value="<?php echo $sitNumbers ;?>" >
                                                                        <i class="fa-solid fa-chair"></i><?php echo  $sitNumbers;?></p>
                                                             <?php   };?> 
                                                            </div>
                                                        <?php } ;?>
                                                    </div>  
                                                    <hr>                                                
                                                </div>
                                            </div>
                                        </div>                             
                                    </div>
                                </div>
                            </div>
                            <!-- End Seat Selection -->

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<footer class="mt-5">
  Design and Developed by : www.iarifbd.com
</footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
