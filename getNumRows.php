<?php
require "conn.php";

$query= $_POST["query"];
$response=array();
if(!isset($_POST["query"])){
	$response["result"]=0;
	$response["message"]="no query";
}else{

$result=mysqli_query($con,$query);
if($result){
	$response["result"]=1;
	$response["count"]=mysqli_num_rows($result);
}else{
		$response["result"]=0;
	    $response["message"]="query error";
}
}
echo json_encode($response);
?>