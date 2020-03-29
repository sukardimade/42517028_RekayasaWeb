<?php
	header("Content-Type:application/json");

	$servername = "localhost";
	    $username = "root";
	    $password = "abc123";
	    $dbname = "youtube";

    $conn = new mysqli($servername, $username, $password, $dbname);

	$smethod = $_SERVER['REQUEST_METHOD'];

	if($smethod == $smethod){

		 parse_str(file_get_contents("php://input"),$post_vars);
    	$id_channel = $post_vars['id_channel'];

		$sql = "DELETE FROM video WHERE id_channel = '$id_channel'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data DELETED";
		$result['result'] = array(
			"id_channel"=>$id_channel,
		);

	}else{
		$result['status']['code'] = 400;
	}


	echo json_encode($result);
?>