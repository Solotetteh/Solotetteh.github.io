<?php
require "conn.php";

$comment_id=$_POST['commentId'];
$respose=array();
if(isset($_POST['commentId'])){
	$query="select * from replies where comment_id=$comment_id";
}else{
	$response["resut"]=0;
	$response["message"]="no comment id";
}
echo json_encode($response);
?>