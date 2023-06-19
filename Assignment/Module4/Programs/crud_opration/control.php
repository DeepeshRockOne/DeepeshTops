<?php
include_once('model.php');
class control extends model
{
    public function __construct()
    {
        model::__construct();
        $path = $_SERVER['PATH_INFO'];

        switch ($path) {
            case '/form':
                if (isset($_REQUEST['submit'])) {
                    $first_name = $_REQUEST['first_name'];
                    $last_name = $_REQUEST['last_name'];
                    $email = $_REQUEST['email'];
                    $username = $_REQUEST['username'];
                    $phone = $_REQUEST['phone'];
                    $password = $_REQUEST['password'];
                    $address = $_REQUEST['address'];
                    $city = $_REQUEST['city'];
                    $gender = $_REQUEST['gender'];
                    $language = implode(",", $_REQUEST['language']);

                    $image = time()."_".    $_FILES['image']['name'];
                    $path = 'images/' . $image;
                    $tmp_image = $_FILES['image']['tmp_name'];
                    move_uploaded_file($tmp_image, $path);

                    $array = array("first_name" => $first_name, "last_name" => $last_name, "email" => $email, "username" => $username, "phone" => $phone, "password" => $password, "address" => $address, "city" => $city, "gender" => $gender, "language" => $language, "image" => $image);
                    $res = $this->insert("user", $array);

                    if ($res) {
                        echo "<script>
                                    alert('Record inserted successfully.');
                                    window.location='records';
                                </script>";
                    } else {
                        echo "<script>
                                    alert('Something went wrong.');
                                    window.location='form';
                                </script>";
                    }
                }
                include_once('form.php');
                break;
            case '/records':
                $records_array = $this->select('user');
                include_once('records.php');
                break;
            case '/delete':
                if (isset($_REQUEST['delete_id'])) {
                    $user_id = $_REQUEST['delete_id'];
                    $where = array('id' => $user_id);
                    $response = $this->select_where('user', $where);
                    $fetch = $response->fetch_object();
                    $image = $fetch->image;

                    if(file_exists('images/'.$image)) {
                        unlink('images/'.$image);
                    }
                    $res = $this->delete_where('user', $where);

                    if ($res) {
                        echo "<script>
                            alert('Record delted successfully.');
                            window.location='records';
                            </script>";
                    } else {
                        echo "<script>
                            alert('Something went wrong on Delete.');
                            window.location='records';
                            </script>";
                    }
                }
                break;
            case '/edit':
                if (isset($_REQUEST['edit_id'])) {
                    $user_id = $_REQUEST['edit_id'];
                    $where = array('id'=>$user_id);
                    $res = $this->select_where('user', $where);
                    $fetch = $res->fetch_object();

                    $old_img = $fetch->image;
                    if (isset($_REQUEST['submit'])) {
                        $first_name = $_REQUEST['first_name'];
                        $last_name = $_REQUEST['last_name'];
                        $email = $_REQUEST['email'];
                        $username = $_REQUEST['username'];
                        $phone = $_REQUEST['phone'];
                        $address = $_REQUEST['address'];
                        $city = $_REQUEST['city'];
                        $gender = $_REQUEST['gender'];
                        $language = implode(",",$_REQUEST['language']);
                        
                        if($_FILES['image']['size'] > 0) {
                            if(file_exists('images/'.$old_img)) {
                                unlink('images/'.$old_img);
                            }
                            $image = time()."_".$_FILES['image']['name'];
                            $path = 'images/' . $image;
                            $tmp_image = $_FILES['image']['tmp_name'];
                            move_uploaded_file($tmp_image, $path);

                            $array = array("first_name" => $first_name, "last_name" => $last_name, "email" => $email, "username" => $username, "phone" => $phone, "address" => $address, "city" => $city, "gender" => $gender, "language" => $language, "image" => $image);
                            $res = $this->update("user", $array, $where);
                        } else {
                            $array = array("first_name" => $first_name, "last_name" => $last_name, "email" => $email, "username" => $username, "phone" => $phone, "address" => $address, "city" => $city, "gender" => $gender, "language" => $language);
                            $res = $this->update("user", $array, $where);
                        }

                        if(isset($res)) {
                            echo "<script>
                                    alert('Record update successfully.');
                                    window.location='records';
                                    </script>";
                        } else {
                            echo "<script>
                                    alert('Something went wrong on Update.');
                                    window.location='records';
                                    </script>";
                        }
                    }
                }
                include_once('edit.php');
            break;
        }
    }
}
$obj = new control();
?>