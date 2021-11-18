<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'ems';

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(!$connection){
  die("QUERY FAILED" . mysqli_error($connection));
}

?>