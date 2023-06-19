<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sate on ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="#" id="state_form" method="post">
        <section class="h-100 bg-dark">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-12">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5">Sate on ajax</h3>

                                        <div class="form-outline">
                                            <label class="form-label" for="city">City</label>
                                            <select name="city" id="city" class="select form-control">
                                                <option value="#">--- Select Country ---</option>
                                            </select>
                                        </div>

                                        <div class="form-outline">
                                            <label class="form-label" for="state">State</label>
                                            <select name="state" id="state" class="select form-control">
                                                <option value="#">--- Select State ---</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="reset" class="btn btn-light btn-lg">Reset all</button>
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
        $.ajax({
            type: 'POST',
            url: 'process.php',
            dataType: 'html',
            data: {
                func: 'countryData'
            },
            success: function(html) {
                $('#city').html(html);
            },
            error: function(error) {
                console.log(error);
            }
        });

        $('#city').change(function() {
            var country_id = $('#city :selected').val();
            if (country_id != "#") {
                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    dataType: 'html',
                    data: {
                        func: 'stateData',
                        country_id: country_id
                    },
                    success: function(html) {
                        $('#state').html(html);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    });
</script>