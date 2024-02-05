<?php
// Create connection to DB with mysql_connect 
$conn = mysqli_connect("db:3306" , "root" ,"root", "db");

// Verify connecion

if(mysqli_connect_errno()) {
    echo "Database error" . mysqli_connect_error();
    exit ();
}
?>