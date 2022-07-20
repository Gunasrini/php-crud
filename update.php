<?php


include "db-connect.php";

$name=$_POST["name"];
$age=$_POST["age"];
$city=$_POST["city"];

$sql = "UPDATE students SET name='{$name}', age={$age}, city='{$city}' WHERE id=".$_POST['id'];

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }


?>