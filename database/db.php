<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="new";

$conn = mysqli_connect($servername,$username,$password);
$db=mysqli_select_db($conn,$dbname);
if($db){

}else{
    echo "database not connected";
}