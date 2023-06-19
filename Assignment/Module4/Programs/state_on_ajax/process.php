<?php
function connect()
{
    $conn = new mysqli('localhost', "root", "", "ajax_country");
    return $conn;
}

$func = $_POST['func'];
echo $func;
$country_id = $_POST['country_id'];

switch ($func) {
    case 'countryData':
        countryData();
        break;
    case 'stateData':
        stateData();
        break;
    default:
        //function not found, error or something
        break;
}

function countryData()
{
    $conn = connect();
    $sql = "SELECT * FROM country";
    $run = $conn->query($sql);
?>
    <option value="#">--Select country--</option>
    <?php
    foreach ($run as $country) {
    ?>
        <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
<?php
    }
}

function stateData()
{
    $conn = connect();
    $country_id = $_POST['country_id'];
    $sql = "SELECT * FROM state WHERE cid = '".$country_id."'";

    $run = $conn->query($sql);
    ?>
        <option value="#">--Select state--</option>
    <?php
    foreach ($run as $state) {
    ?>
        <option value="<?php echo $state['id']; ?>"><?php echo $state['sname']; ?></option>
    <?php
    }
}
?>