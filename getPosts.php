<?php
require "conn.php";

$query= $_POST['query'];
$response=array();
if(!isset($_POST['query'])){
	$response["result"]=0;
	$response["message"]="no query";
}else{
	$result=mysqli_query($con,$query);
	if(!empty($result)){
			$response["result"]=1;
			while($row=mysqli_fetch_array($result)){
				$post=array();
				
				$post["postTime"]=$row["post_time"];
				$post["posterId"]=$row["poster_id"];
				$post["postId"]=$row["post_id"];
				$post["caption"]=$row["caption"];
				$post["destination"]=$row["destination"];
				$post["destinationId"]=$row["destination_id"];
				$post["visibility"]=$row["visibility"];
				$post["postType"]=$row["post_type"];
				
				array_push($response["posts"],$post);
			}
	}else{
		$response["result"]=0;
     	$response["message"]="no posts";
	}
}
echo json_encode($response);
?>