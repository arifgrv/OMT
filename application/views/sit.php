<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        .seat.available {
            background-color: #28a745;
            color: #fff;
        }

        .seat.reserved {
            background-color: #dc3545;
            color: #fff;
        }

        .seat.selected {
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <title>Seat Reservation</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Select Your Seat</h2>

    <div class="row">
        <?php
        $totalRows = 10;
        $totalColumns = 13;

        for ($row = 1; $row <= $totalRows; $row++) {
            echo '<div class="col-md-12 mb-2">';
            for ($column = 1; $column <= $totalColumns; $column++) {
                $seatNumber = ($row - 1) * $totalColumns + $column;
                echo '<button class="btn seat available" data-seat="' . $seatNumber . '">' . $seatNumber . '</button>';
            }
            echo '</div>';
        }
        ?>
    </div>

    <div class="mt-3">
        <button class="btn btn-success" id="reserveBtn">Reserve Selected Seats</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.seat').on('click', function () {
            $(this).toggleClass('selected');
        });

        $('#reserveBtn').on('click', function () {
            var selectedSeats = $('.seat.selected').map(function () {
                return $(this).data('seat');
            }).get();

            alert('Reserved Seats: ' + selectedSeats.join(', '));
        });
    });
</script>

</body>
</html>
