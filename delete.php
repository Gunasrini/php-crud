<?php 
	include "db-connect.php";
	$sql="delete from students where id =".$_POST["id"];

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
?>