<?php
require "conn.php";

$id=$_POST['id'];

$response=array();

if(isset[$_POST['id']]){
	$query = "select * from users where user_id=$id";
	
	
	$result=mysqli_query($con,$query);
	if($row=mysqli_fetch_array($result)){
			$response["result"]=1;
		$response["userName"]=$row["user_name"];
		$response["displayPhoto"]=$row["display_photo"];
		$response["name"]=$row["name"];
		$response["gender"]=$row["gender"];
		$response["isVerified"]=$row["verified"];
	
		
	}else{
		$response["result"]=0;
		$response["message"]="query error";
	}
	
	
}else{
	$response["result"]=0;
	$response["message"]="provide user id";
}
echo json_encode($response);
?>