<?php
require "conn.php"

$query=&_POST["query"];
$response=array();
if($con){	
	if(mysqli_query($con,$query)){
       $response["result"]=1;
	}else{
	$response["result"]=0;
	$response["message"]="query execution failed "+mysqli_connect_error();
	}
}
else{
     $response["result"]=0;
	$response["message"]="connection failed";
}
echo  json_encode($response);

?>