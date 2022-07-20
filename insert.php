<?php

include "db-connect.php";

// print_r([$_POST]);

$name=$_POST["name"];
$age=$_POST["age"];
$city=$_POST["city"];
$sql = "INSERT INTO students (NAME, AGE, CITY) VALUES ('{$name}',{$age},'{$city}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


?>