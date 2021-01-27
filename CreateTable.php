<?php

require_once _DIR_ '/conn.php'

$sql="create table clubs (group_name TEXT, ID INT primary key auto_increment, banner TEXT, creation_date DATETIME, admin_id INT, note TEXT)";
$db=new conn();

echo("Connected");

if(mysql_query($sql))echo("table created successfully");
else echo("table not created");
}
?>