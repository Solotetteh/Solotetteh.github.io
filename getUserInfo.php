<?php
require "conn.php";

$id=$_POST['id'];

$response=array();

if(isset($_POST['d'])){
	$query = "select * from users where user_id = $id";
	
	
	$result=mysqli_query($con,$query);
	if($row=mysqli_fetch_array($result)){
			$response["result"]=1;
		$response["userName"]=$row["user_name"];
		$response["displayPhoto"]=$row["display_photo"];
		$response["name"]=$row["name"];
		$response["country"]=$row["country"];
		$response["city"]=$row["city"];
		$response["note"]=$row["note"];
		$response["gender"]=$row["gender"];
		$response["accountType"]=$row["account_type"];
		$response["isVerified"]=$row["verified"];

		$following="select * from followed where user_id = $id";
		$res=mysqli_query($con,$following);
		$response["follwing"]=mysqli_num_rows($res);
		
		$followers="select * from followed where followed_account = $id";
		$res=mysqli_query($con,$followers);
		$response["followers"]=mysqli_num_rows($res);
		
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