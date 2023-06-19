<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form id="edit_form" method="post" enctype="multipart/form-data">
        <section class="h-100 bg-dark">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-12">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5">Edit Ristration form</h3>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example1m">First name</label>
                                                    <input name="first_name" type="text" id="form3Example1m" class="form-control" value="<?php echo $fetch->first_name; ?>" placeholder="First name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example1n">Last name</label>
                                                    <input name="last_name" type="text" id="form3Example1n" class="form-control" value="<?php echo $fetch->last_name; ?>" placeholder="Last name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example97">Email</label>
                                            <input name="email" type="email" id="form3Example97" class="form-control" value="<?php echo $fetch->email; ?>" placeholder="Email" />
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example97">Username</label>
                                            <input name="username" type="text" id="form3Example97" class="form-control" value="<?php echo $fetch->username; ?>" placeholder="Username" />
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="phone">Phone number</label>
                                            <input name="phone" type="text" id="phone" class="form-control" value="<?php echo $fetch->phone; ?>" placeholder="Phone number" />
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example8">Address</label>
                                            <textarea name="address" id="form3Example8" class="form-control" rows="3" placeholder="Address"><?php echo $fetch->address; ?></textarea>
                                        </div>

                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example9">City</label>
                                            <select name="city" id="form3Example9" class="select form-control">
                                                <option value="#">--- Select City ---</option>
                                                <option value="India" <?php if($fetch->city == 'India') { echo " selected"; } ?>>India</option>
                                                <option value="Japan" <?php if($fetch->city == 'Japan') { echo " selected"; } ?>>Japan</option>
                                                <option value="Australia" <?php if($fetch->city == 'Australia') { echo " selected"; } ?>>Australia</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="d-md-flex justify-content-start align-items-center py-2">
                                                    <h6 class="mb-0 me-4">Gender: </h6>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" <?php if($fetch->gender == 'Female') { echo " checked"; } ?> />
                                                        <label class="form-check-label" for="femaleGender">Female</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" <?php if($fetch->gender == 'Male') { echo " checked"; } ?> />
                                                        <label class="form-check-label" for="maleGender">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Other" <?php if($fetch->gender == 'Other') { echo " checked"; } ?> />
                                                        <label class="form-check-label" for="otherGender">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-md-flex justify-content-start align-items-center py-2">
                                                    <label class="form-label" for="language">Language: </label>
                                                    <?php  $fetched_language = explode(",",$fetch->language); ?>
                                                    
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input type="checkbox" name="language[]" id="checkboxes-0" value="English" <?php if(in_array('English', $fetched_language)) { echo " checked"; } ?>>
                                                        English
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input type="checkbox" name="language[]" id="checkboxes-1" value="Hindi" <?php if(in_array('Hindi', $fetched_language)) { echo " checked"; } ?>>
                                                        Hindi
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input type="checkbox" name="language[]" id="checkboxes-2" value="Gujarati" <?php if(in_array('Gujarati', $fetched_language)) { echo " checked"; } ?>>
                                                        Gujarati
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example90">Image</label>
                                            <img src="images/<?php echo $fetch->image; ?>" width="177px" alt="images" height="112px" >
                                            <input name="image" class="form-control" id="form3Example90" type="file" />
                                        </div>
                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="submit" name="submit" class="btn btn-warning btn-lg ms-2">Update</button>
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