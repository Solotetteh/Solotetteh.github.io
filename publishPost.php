<?php
require "conn.php";
             			
	$postTime=$_POST['postTime'];
    $posterId=$_POST['posterId'];
    $caption=$_POST['caption'];
    $destination=$_POST['destination'];
    $destinationId=$_POST['destinationId'];
    $visibility=$_POST['visibility'];
	$postType=$_POST['postType'];
$query= "insert into posts (poster_id,caption,destination,destination_id,visibility,post_type) values ($posterId,'$caption',
'$destination',$destinationId,'$visibility','$postType')";
   
    $response=array();


	if(mysqli_query($con,$query)){
		$response["result"]=1;
	$response["id"]=mysqli_insert_id($con);
	}else{
			$response["result"]=0;
	$response["message"]="query error";
	}

echo json_encode($response);
?>