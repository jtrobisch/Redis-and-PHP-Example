<?php
try {
    $redis = new Redis();
    $redis->connect('localhost', 6379);
    $redis->auth('mypass');
	
    $array = array(
    "user" => $_POST["RegUsername"],
    "pass" => $_POST["RegPassword"],
    "firstName" => $_POST["RegFirstName"],
    "lastName" => $_POST["RegLastName"],
    "age" => $_POST["RegAge"],);

    $redis->hmset("user:".$_POST["RegUsername"], $array);
    $status = "Success";
	header( "Location:index.php?status=$status");
    //$boo = $redis->hgetall('user:'.$_POST["RegUsername"]);
    //var_dump($boo);
} catch (Exception $ex) {
    echo $ex->getMessage();
    $status = "Failed";
    header( "Location:index.php?status=$status");
}
?>