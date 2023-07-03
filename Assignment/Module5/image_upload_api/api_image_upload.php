<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $conn = mysqli_connect('localhost','root','','image_upload_api');

    if(!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    $array_data = json_decode(file_get_contents("php://input"), true);

    $fileName = $_FILES['image']['name'];
    $tempPath = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];

    if (empty($fileName))
    {
        echo json_encode(array("message" => "Please add image", "status" => false));
    } else {
        $upload_path = 'upload/';

        $allowedExts = array("jpg", "jpeg", "png", "gif");
        $temp = explode(".", $fileName);
        $extension = strtolower(end($temp));

        $fileUploadName = time() . '_img.' . $extension;
        $fileStoreSize = number_format(($fileSize/1024), 2) . ' kb';
        $file_location = 'http://localhost/image_upload_api/upload/'.$fileUploadName;

        if (in_array($extension, $allowedExts)) {
            if ($fileSize < 5000000) {
                move_uploaded_file($tempPath, $upload_path . $fileUploadName);

                $query = "INSERT INTO images (file_location, size) VALUES ('".$file_location."', '".$fileStoreSize."')";

                if (mysqli_query($conn, $query) or die("Insert query failed")) {
                    echo json_encode(array("message" => "Image uploaded successfully", "status" => true));
                } else {
                    echo json_encode(array("message" => "Failed image not uploaded", "status" => false));
                }
            } else {
                echo json_encode(array("message" => "Your file is too large, please upload 5 MB size", "status" => false));
            }
        } else {
            echo json_encode(array("message" => "Only JPG, JPEG, PNG & GIF files are allowed", "status" => false));
        }
    }
?>