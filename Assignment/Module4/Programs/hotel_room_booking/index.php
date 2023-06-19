<!DOCTYPE html>
<html>

<head>
    <title>Hotel Room Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div id="booking-form">
                    <h3 class="text-center">Hotel Room Booking System</h3>
                    <label>Booking Type:</label>
                    <select id="booking_type" class="form-control">
                        <option value="full-day">Full Day</option>
                        <option value="half-day">Half Day</option>
                        <option value="custom">Custom</option>
                    </select>
                    <br>
                    <label>Check-in Date:</label>
                    <input type="date" id="checkin_date" class="form-control">
                    <br>
                    <label>Check-out Date:</label>
                    <input type="date" id="checkout_date" class="form-control">
                    <br>
                    <label id="slot_label" style="display: none;">Slot:</label>
                    <select id="slot" class="form-control" style="display: none;">
                        <option value="morning">Morning (8AM to 6PM)</option>
                        <option value="evening">Evening (7PM to Morning 7AM)</option>
                    </select>
                    <br>
                    <div class="text-center">
                        <button id="submit_btn" class="btn btn-primary">Book Room</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>