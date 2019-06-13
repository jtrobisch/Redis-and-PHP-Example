<?php
if(isset($_POST["username"]) && isset($_POST["password"])){
	try {
	    $redis = new Redis();
	    $redis->connect('localhost', 6379);
	    $redis->auth('mypass');

  		$user = $redis->hgetall('user:'.$_POST["username"]);
 		if(sizeof($user)==0){
 				$status = "Failed";
	  			header( "Location:index.php?loginStatus=$status");
 		}else{
 				//var_dump($user);
				if($user['pass'] === $_POST["password"]){
							session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $_POST["username"];  
							header( "Location:controlPanel.php");
				}else{
					$status = "Failed";
	  				header( "Location:index.php?loginStatus=$status");
				}
 		}
	} catch (Exception $ex) {
	    echo $ex->getMessage();
	    $status = "Failed";
	  	header( "Location:index.php?loginStatus=$status");
	}

}else{
	  $status = "Failed";
	  header( "Location:index.php?loginStatus=$status");
}
?>