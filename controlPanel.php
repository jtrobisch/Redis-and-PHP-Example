<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		
}else{
		$status = "Failed";
	  	header( "Location:index.php?loginStatus=$status");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Redis Example</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class ="nav"><ul><li><a href="">Welcome <?php echo  $_SESSION["username"];?> </a></li><li  style="float:right"><a href="logout.php">Logout</a></li></ul></div>

	<?php
		try {
		    $redis = new Redis();
		    $redis->connect('localhost', 6379);
		    $redis->auth('mypass');
			
			$results =  $redis->lrange("superposting",0,10000);
			echo '<table>';
 			foreach ($results as &$value) {
				echo "<tr><td>$value</tr></td>";
			}
			echo '</table>';
		 	//var_dump($results);
			
		} catch (Exception $ex) {
		    echo $ex->getMessage();
		    header( "Location:controlPanel.php");
		}	
	?>


	<br/><br/>
	<div class="add_post">
		<form action="post.php" method="POST">
			<textarea rows="4" cols="50" required="true" name="entered_text" style="resize: none;"></textarea>
			<input type="submit" value="Submit Post">
		</form>
	</div>
</body>
</html>
