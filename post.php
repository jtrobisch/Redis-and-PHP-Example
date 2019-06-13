<?php
session_start();
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		try {
		    $redis = new Redis();
		    $redis->connect('localhost', 6379);
		    $redis->auth('mypass');

			$t=time();
		  	$redis->lpush("superposting",$_POST["entered_text"]." POSTED BY ".$_SESSION["username"]. " ON ".date("d-m-Y",$t));

			header( "Location:controlPanel.php");
		} catch (Exception $ex) {
		    echo $ex->getMessage();
		    header( "Location:controlPanel.php");
		}	
	}else{
			$status = "Failed";
		  	header( "Location:index.php?loginStatus=$status");
	}
 ?>