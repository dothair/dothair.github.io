<?php
if (is_ajax()) {
if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
$action = $_POST["action"];
switch($action) { //Switch case for value of action
case "test": test_function(); break;
case "time": time_function(); break;
case "price": price_function(); break;
}
}
}
//Function to check if the request is an AJAX request
function is_ajax() {
return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function test_function(){
$return = $_POST;
//Do what you need to do with the info. The following are some examples.
//if ($return["favorite_beverage"] == ""){
// $return["favorite_beverage"] = "Coke";
//}
//$return["favorite_restaurant"] = "McDonald's";
$return["json"] = json_encode($return);
echo json_encode($return);
}
function time_function(){
$servername = "localhost";
$username = "u676687572_dot";
$password = "Rahul123";
$tbname = $_POST["tbname"];
$dbname = 'u676687572_salon';
$id =  $_POST["id"];
$time =  $_POST["time"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die ("Failed to connect to MySQL: " . mysqli_connect_error());
$sql = "INSERT INTO $tbname (tutorial_id, time)
VALUES('$id', '$time')
ON DUPLICATE KEY UPDATE tutorial_id= '$id', time = '$time'
";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
$return = $_POST;
//Do what you need to do with the info. The following are some examples.
//if ($return["favorite_beverage"] == ""){
// $return["favorite_beverage"] = "Coke";
//}
//$return["favorite_restaurant"] = "McDonald's";
$return["json"] = json_encode($return);
echo json_encode($return);
}
function price_function(){
	$servername = "localhost";
$username = "u676687572_dot";
$password = "Rahul123";
$dbname = 'u676687572_salon';
$tbname = $_POST["tbname"];
$id =  $_POST["id"];
$price =  $_POST["price"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die ("Failed to connect to MySQL: " . mysqli_connect_error());
$sql = "INSERT INTO $tbname (tutorial_id, price)
VALUES('$id', '$price')
ON DUPLICATE KEY UPDATE tutorial_id= '$id', price = '$price'
";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
$return = $_POST;
//Do what you need to do with the info. The following are some examples.
//if ($return["favorite_beverage"] == ""){
// $return["favorite_beverage"] = "Coke";
//}
//$return["favorite_restaurant"] = "McDonald's";
$return["json"] = json_encode($return);
echo json_encode($return);
}
?>