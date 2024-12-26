<?php

$conn = mysqli_connect('localhost', 'root', '', 'customers');

if(!$conn){
   die("Connection failed: " . mysqli_connect_error());
}

?>
