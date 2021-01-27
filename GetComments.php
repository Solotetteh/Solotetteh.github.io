<?php
require "conn.php";
$post_id=$_POST['post_id'] ;
if(isset($_POST['post_id'])){
	
	$query="select * from comments where post_id= $post_id order by comment_date DESC";
	$result= mysqli_query($con,query);
	
	$response=array();
	if(empty(result))$response["result"]="0";
	else{
		$response["result"]="1";
		while($row=mysqli_fetch_array($result)){
			
			$comment=array();
			$comment["comment"]=$row["comment"];
			$comment["comment_date"]=$row["comment_date"];
			$comment["comment_id"]=$row["comment_id"];
			$comment["post_id"]=$row["post_id"];
			$comment["commenter_id"]=$row["commenter_id"];

           array_push($response["comments"],$comment);
		}
	}
}else{
	
}
echo json_encode($response);

?>