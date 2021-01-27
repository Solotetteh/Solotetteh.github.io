<?php
require "conn.php";

$query= $_POST['query'];
$response=array();

if(!isset($_POST['query'])){
	$response["result"]=0;
	$response["message"]="no query";
}else{
	if(mysqli_query($con,$query)){
		$response["result"]=1;
	$response["id"]=mysqli_insert_id($con);
	}else{
			$response["result"]=0;
	$response["message"]="query error";
	}
}
echo json_encode($response);
?>