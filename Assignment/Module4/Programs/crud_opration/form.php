<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ristration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form id="registration_form" method="post" enctype="multipart/form-data">
        <section class="h-100 bg-dark">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-12">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5">Ristration form</h3>

                                        <div class="d-flex justify-content-end pt-3">
                                            <a href="records" class="btn btn-warning btn-lg ms-2">View Records</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example1m">First name</label>
                                                    <input name="first_name" type="text" id="form3Example1m" class="form-control" placeholder="First name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example1n">Last name</label>
                                                    <input name="last_name" type="text" id="form3Example1n" class="form-control" placeholder="Last name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example97">Email</label>
                                            <input name="email" type="email" id="form3Example97" class="form-control" placeholder="Email" />
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example97">Username</label>
                                            <input name="username" type="text" id="form3Example97" class="form-control" placeholder="Username" />
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="phone">Phone number</label>
                                            <input name="phone" type="text" id="phone" class="form-control" placeholder="Phone number" />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input name="password" type="password" id="password" class="form-control" placeholder="Password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="confirm_password">Confirm Password</label>
                                                    <input name="confirm_password" type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example8">Address</label>
                                            <textarea name="address" id="form3Example8" class="form-control" rows="3" placeholder="Address"></textarea>
                                        </div>

                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example9">City</label>
                                            <select name="city" id="form3Example9" class="select form-control">
                                                <option value="#">--- Select City ---</option>
                                                <option value="India">India</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Australia">Australia</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="d-md-flex justify-content-start align-items-center py-2">
                                                    <h6 class="mb-0 me-4">Gender: </h6>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" />
                                                        <label class="form-check-label" for="femaleGender">Female</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" />
                                                        <label class="form-check-label" for="maleGender">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Other" />
                                                        <label class="form-check-label" for="otherGender">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-md-flex justify-content-start align-items-center py-2">
                                                    <label class="form-label" for="language">Language: </label>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input type="checkbox" name="language[]" id="checkboxes-0" value="English">
                                                        English
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input type="checkbox" name="language[]" id="checkboxes-1" value="Hindi">
                                                        Hindi
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input type="checkbox" name="language[]" id="checkboxes-2" value="Gujarati">
                                                        Gujarati
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example90">Image</label>
                                            <input name="image" class="form-control" id="form3Example90" type="file" />
                                        </div>
                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="reset" name="reset" class="btn btn-light btn-lg">Reset all</button>
                                            <button type="submit" name="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
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