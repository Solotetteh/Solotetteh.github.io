<?php
require "conn.php";



	$poster_id = $POST['commenter_id'];
	$comment = $_POST['comment'];
	$comment_time= $_POST['comment_time'];
	$commenter_id=$_POST['commenter_id'];
	
	$sql="insert into comments (commenter_id,comment,comment_time,post_id) VALUES ($commenter_id,$comment,$comment_time,$post_id)";
	$query=$_POST['query'];
	if(!isset($_POST['query']))$query=$sql;
	
	$response=array();
	
	if(mysqli_query($con,&query))$response["result"]=1;
	else $response["result"]=0;
	
	echo json_encode($response);


?>