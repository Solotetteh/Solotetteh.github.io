<?php
require "conn.php";
$query=$_POST['query'];

$response = array();

if(!isset($_POST['query'])){
	$response["result"]=0;
	$response["message"]="no query";
}else{
	$response["result"]=1;
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result)){
		$account=array();

		$account["userName"]=$row["user_name"];
		$account["displayPhoto"]=$row["display_photo"];
		$account["name"]=$row["name"];
		$account["gender"]=$row["gender"];
		$account["isVerified"]=$row["verified"];
		
		array_push($response["accounts"],$account);
	}
}
echo json_encode($response);
?>