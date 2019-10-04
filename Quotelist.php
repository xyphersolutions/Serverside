<?php
include 'connection.php';
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['id']))
{
$sql = "SELECT * from user_quotes t1 INNER JOIN agent_list_tb t2
                ON t1.a_id= t2.id INNER JOIN afmv t3
                ON t1.fmv_id= t3.fmv_id WHERE a_id = '".$_GET['id']."' ";
}
else if (isset($_GET['track']))
{
$sql = "SELECT * from user_quotes t1 INNER JOIN agent_list_tb t2
                ON t1.a_id= t2.id INNER JOIN afmv t3
                ON t1.fmv_id= t3.fmv_id WHERE tracking_no = '".$_GET['track']."' ";
}


$result = $conn->query($sql);
if ($result->num_rows >0) {
 while($row[] = $result->fetch_array()) {
 $tem = $row;
 $json = json_encode($tem);
 }
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>