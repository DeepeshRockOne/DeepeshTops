$(document).ready(function() {
    $('#booking_type').change(function() {
        var bookingType = $(this).val();

        if (bookingType === 'half-day') {
            $('#slot_label').show();
            $('#slot').show();
        } else {
            $('#slot_label').hide();
            $('#slot').hide();
        }
    });

    $('#submit_btn').click(function() {
        var bookingType = $('#booking_type').val();
        var checkinDate = $('#checkin_date').val();
        var checkoutDate = $('#checkout_date').val();

        var slot = $('#slot').val();

        if (!checkinDate) {
            alert('Please select a check-in date.');
            return;
        }
        if (!checkoutDate) {
            alert('Please select a check-out date.');
            return;
        }
        if (bookingType === 'half-day' && !slot) {
            alert('Please select a slot.');
            return;
        }
        if (Date.parse(checkoutDate) < Date.parse(checkinDate)) {
            alert('Please select valid checkout date.');
            return;
        }

        var booking = {
            bookingType: bookingType,
            checkinDate: checkinDate,
            checkoutDate: checkoutDate,

            slot: slot
        };

        $.ajax({
            url: 'process_booking.php',
            type: 'POST',
            data: booking,
            success: function(response) {
                if (response === 'success') {
                    alert('Room booked successfully!');
                } else {
                    alert('Failed to book the room. Please try again.');
                }
            },
            error: function() {
                alert('An error occurred. Please try again later.');
            }
        });
    });
});
