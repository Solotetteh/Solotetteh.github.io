<?php
require "conn.php";

$response = array();
$login_contact=$_POST['contact'];
$password=$_POST['password'];

	if(isset($_POST['contact'])&&isset($_POST['password'])){
	$response["result"]=2;
	//check if an account exists with this login contact
	$query="select * from users where login_contact like '$login_contact' and login_password = '$password'";
	$result=mysqli_query($con,$query);
	if($row=mysqli_fetch_array($result)){
		//if one does exist check if it's password matches the provided password
		$query="select * from users where login_contact like '$login_contact' and login_password like '$password'";
		
		$result=mysqli_query($con,$query);
	   if($row=mysqli_fetch_array($result)){
		$response["result"]=1;
		$response["user_id"]=$row["user_id"];
	   }
	   else{
		$response["result"]=0;
		$response["message"]="Wrong password";
	}
	}else{
		$response["result"]=0;
		$response["message"]="No account";
	}
}else{
	$response["result"]=0;
	$response["message"]="Contact or password empty";
}
echo json_encode($response);
?>