<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5">Records</h3>

                            <div class="form-outline">
                                <div class="d-flex justify-content-end pt-3">
                                    <a href="form" class="btn btn-warning btn-lg ms-2">Add new record</a>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Language</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($records_array)) {
                                            foreach ($records_array as $record) {
                                        ?>
                                                <tr>
                                                    <td scope="row"><?php echo $record->id; ?></td>
                                                    <td><img src="<?php echo 'images/'.$record->image; ?>" width="100px"></td>
                                                    <td><?php echo $record->first_name; ?></td>
                                                    <td><?php echo $record->last_name; ?></td>
                                                    <td><?php echo $record->email; ?></td>
                                                    <td><?php echo $record->username; ?></td>
                                                    <td><?php echo $record->phone; ?></td>
                                                    <td><?php echo $record->address; ?></td>
                                                    <td><?php echo $record->city; ?></td>
                                                    <td><?php echo $record->gender; ?></td>
                                                    <td><?php echo $record->language; ?></td>
                                                    <td><?php echo $record->status; ?></td>
                                                    <td>
                                                        <a href="edit?edit_id=<?php echo $record->id; ?>"><i class="fa fa-edit"> Edit</i></a>
                                                        <a href="delete?delete_id=<?php echo $record->id; ?>"><i class="fa fa-trash-o"> Delete</i></a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                        ?>
                                        <tr>
                                            <td colspan="14">No Records to view</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>