<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquery Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="#" id="requied_validation_form" method="post">
        <section class="h-100 bg-dark">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-12">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5">Requried field validation</h3>

                                        <div class="form-outline">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" />
                                            <span id="nameError"></span>
                                        </div>

                                        <div class="form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" />
                                            <span id="emailError"></span>
                                        </div>

                                        <div class="form-outline">
                                            <label class="form-label" for="city">City</label>
                                            <select name="city" id="city" class="select form-control">
                                                <option value="">--- Select City ---</option>
                                                <option value="India">India</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Australia">Australia</option>
                                            </select>
                                            <span id="cityError"></span>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="d-md-flex justify-content-start align-items-center py-2">
                                                    <h6 class="mb-0 me-4">Gender: </h6>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" />
                                                        <label class="form-check-label" for="femaleGender">Female</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" />
                                                        <label class="form-check-label" for="maleGender">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Other" />
                                                        <label class="form-check-label" for="otherGender">Other</label>
                                                    </div>
                                                    <span id="genderError"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').on('submit', function(event) {
            var err = false;
            var count = 0;
            $('form input,form select').each(function() {
                if ($(this).val().trim() == '') {
                    $(this).css('border-color', 'red');
                    $('#' + $(this).attr('id') + 'Error').text('This field is required');
                    $('#' + $(this).attr('id') + 'Error').css({
                        'color': 'red'
                    });
                    err = true;
                } else if ($(this).attr('type') == 'radio') {
                    if ($(this).prop('checked')) {
                        $('#' + $(this).attr('id') + 'Error').text('');
                        count++;
                    }
                    if(count == 0) {
                        $('#' + $(this).attr('id') + 'Error').text('This field is required');
                        $('#' + $(this).attr('id') + 'Error').css({
                            'color': 'red'
                        });
                        err = true;
                    }
                } else {
                    $(this).css('border-color', '');
                    $('#' + $(this).attr('id') + 'Error').text('');
                }
            });

            if (err === true) {
                event.preventDefault();
            }
        });
    });
</script>