<?php
require "conn.php";

$query=$_POST['query'];

$response=array();

if(isset[$_POST['query']]){
	
	
	$result=mysqli_query($con,$query);
	if($result){
				$response["result"]=1;
	while($row=mysqli_fetch_array($result)){
		
		$user=array();
		$user["userName"]=$row["user_name"];
		$user["displayPhoto"]=$row["display_photo"];
		$user["name"]=$row["name"];
		$user["gender"]=$row["gender"];
		$user["verified"]=$row["verified"];
		user['userId"]=$row["user_id"];
	
	  array_push($response["users"],$user);	
	}
	}else{
		$response["result"]=0;
		$response["message"]="query error";
	}
	
	
}else{
	$response["result"]=0;
	$response["message"]="pno query";
}
echo json_encode($response);
?>